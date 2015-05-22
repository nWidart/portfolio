title: Deploy your projects with zero downtime
slug: deploy-your-projects-with-zero-downtime
status: published
date: 22 may 2015
tags: development,deployment
meta-description: Learn how to deploy your projects with zero downtime thanks to deployer.org and it's free,

-------

Deploying your project is an important part of our workflow as web developers. There are multiple solutions to this. 

Up until now I've been using [Laravel Forge](https://forge.laravel.com/). It does more then deployment though, it sets up the server with everything you need (PHP, Nginx, Redis, Postgres, MySQL, Beanstalk) for laravel and general PHP applications.

The deployment part of Laravel Forge is quite simple, it's a push-to-deploy. Push to the branch you specified in Forge and it'll get deployed to your server.

This ok, but while your app is deploying it is not available as Forge needs to update composer dependencies and so on. This is why Taylor Otwell, creator of the Laravel framework and Laravel Forge, created [Envoyer.io](https://envoyer.io/). The tagline is pretty straightforward: "Zero Downtime PHP Deployment". For this, you'll have to drop another $10 a month (Forge is also $10/mo).

We're going to go over how to do this, **for free**.

## Free alternative, deployer.org

For this we're going to use an opensource package called [deployer](http://deployer.org/). This package lets you do the exact same thing as other paid services, but for free *and* you keep control over your deployments.

Deployer lets you easily create deployments scripts per environment, add custom tasks, run functions and more, all of this with zero downtime of your precious application.

So how does this work ?

### Install deployer

You have 2 options on how to install deployer. Either you download the php archive (phar) directly, or you install it globally with composer.

#### Using deployer.phar

- [Download](http://deployer.org/deployer.phar) the `deployer.phar` file,
- move to the directory you downlaoded that file,
- run: `mv deployer.phar /usr/local/bin/dep`,
- and finally run: `chmod +x /usr/local/bin/dep`.

You're good to go.

#### Using composer

- Run: `composer global require deployer/deployer:~3.0`,
- if you have the composer path in your `PATH` you're already good to go.

Check the [Installation docs](http://deployer.org/docs/installation) on how to update deployer.

### Usage

We're now ready to use deployer in our projects. First thing we need to do is add a `deploy.php` file at the root of our project. This file will be used to setup servers, environments and tasks.

*I'm going to assume now that we're on a laravel project*, but if you're not, keep reading as this will give you inspiration on how to make this work in your project too.

First thing we need to do is setup our server. You can setup multiple servers, but for this example we'll just go with one.

#### Setting up server

Setting up a server is easy:

``` .language-php
server('staging', 'yoursite.com', 22)
    ->user('forge')
    ->identityFile()
    ->stage('staging')
    ->env('branch', 'develop')
    ->env('deploy_path', '/home/forge/yoursite.com');
```
As you can see we can name this server (`staging`), and we give it the host url or ip. `->identityFile()` is used to login on our server using or ssh key. Given no arguments this will use the default names: `->identityFile('~/.ssh/id_rsa.pub', '~/.ssh/id_rsa', '')`, you can overwrite this by giving those arguments.

As you can see I've also specified which branch to use on the repository we'll use in the next step.

You can also login with a username and password:

``` .language-php
->user('name', 'password')
```

Read more options on how to setup servers on the [server documentation page](http://deployer.org/docs/servers).

#### Setup your git repository

Next we need to tell deployer which repository to use:

``` .language-php
set('repository', 'git@github.com:vendor/yoursite.git');
```

Deployer will use the branch we site earlier in the server configuration.

#### Setting up environment file

In laravel we have a `.env` file which is read by [vlucas/phpdotenv](https://github.com/vlucas/phpdotenv) package. Since this is not laravel specific your project may quite possibly also use this.

It is important to know how deployer can deploy with zero downtime. What it does is creating 3 folders in the specified folder in the server configuration. 

1. **releases**: This will contain the latest 3 (by default) releases of your application. A release is created everytime you deploy your application.
2. **current**: This is a symlink to the latest release of your application.
3. **shared**: This is a folder that's kept in between releases. A storage folder could be placed inside here.

As your `.env` file is not in version controll how do we create it ? We're going to take advantage of the **shared** folder. Create a `.env` file in this shared folder (for this you'll have to deploy at least once), and add all your required environment variables for your project.

Next you're going to create a [custom task](http://deployer.org/docs/tasks) to add this environment file to the current release.

``` .language-php
task('environment', function () {
    run('cp /home/forge/yourwebsite.com/shared/.env {{release_path}}/.env');
})->desc('Environment setup');
```

This task will copy this `.env` file from the shared folder to the current release path.


#### Set writable directories

Next we need to specify which directories are going to be writable:

``` .language-php
set('writable_dirs', ['storage', 'vendor']);
```

#### Deploy task

And finally we're going to create our deploy task, which is a collection of other tasks.

``` .language-php
task('deploy', [
    'deploy:prepare',
    'deploy:release',
    'deploy:update_code',
    'deploy:vendors',
    'deploy:symlink',
    'cleanup',
    'environment',
])->desc('Deploy your project');
```
To know what each one does, check out the [`common.php`](https://github.com/deployphp/deployer/blob/master/recipe/common.php) file. **This file needs to be included at the start of our `deploy.php` file.**


### Putting it all together

This is what our `deploy.php` file looks like:


``` .language-php
<?php

require_once 'recipe/common.php';

set('keep_releases', 5);

server('staging', 'yoursite.com', 22)
    ->user('forge')
    ->identityFile()
    ->stage('staging')
    ->env('branch', 'develop')
    ->env('deploy_path', '/home/forge/yoursite.com');

set('repository', 'git@github.com:vendor/yoursite.git');

/**
 * Setup the environment file in the new release
 */
task('environment', function () {
    run('cp /home/forge/yoursite.com/shared/.env {{release_path}}/.env');
})->desc('Environment setup');

// Laravel writable dirs
set('writable_dirs', ['storage', 'vendor']);

/**
 * Main task
 */
task('deploy', [
    'deploy:prepare',
    'deploy:release',
    'deploy:update_code',
    'deploy:vendors',
    'deploy:symlink',
    'cleanup',
    'environment',
])->desc('Deploy your project');

after('deploy', 'success');
```

I've added an option to keep the latest 5 releases, this defaults to 3.

#### Deploy!

You can now run the deployment script using `dep deploy staging`.

### Nginx

Your nginx configuration should be modified sliglty. First you'll need to change the document root to the **current** directory, which is a symlink to the latest release of your application. For laravel projects this would be `current/public`

``` .language-bash
/home/forge/yoursite.com/current/public
```

Because this is a symlink, you also need to add the following in the `server` block:

``` .language-bash
disable_symlinks off;
```

### Nice to haves

If something goes wrong with your latest release simply rollback:

``` .language-bash
dep rollback staging
```

Don't trust this yet ? Run the verbose mode to see what will be run on the server:

``` .language-bash
dep deploy staging -vvv
```

### Optimisation

One caviat of this technique is that creating new release folders will reset realpath cache and opcode cache. One way around this is to add this to your `location` block in your nginx virtual host:

``` .language-bash
fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name; 
fastcgi_param DOCUMENT_ROOT $realpath_root;
```
### Todo

To make this even better, we could add the laravel's `storage` folder on the **shared** folder, so that we keep our logs (and sessions/cache if you use file based sessions/cache, you shouldn't.)

To do this, it's quite simple:

``` .language-php
set('shared_dirs', ['storage']);
```
The hard part is to change this path for laravel, this is what I haven't figured out yet. In laravel 4 this was a simple configuration file to modify. Though in Laravel 5 we actually need to extend the `Application` class to overwrite this.


## Alternatives

- [Capistrano](http://capistranorb.com/): free, uses ruby
- [Envoyer.io](https://envoyer.io/): paid.
- [Robo.li](http://robo.li/): free


Let me know how you handle your deployments !



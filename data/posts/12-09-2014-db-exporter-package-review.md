title: Database Exporter package review
slug: db-exporter-package-review
status: published
date: 12 sep 2014
tags: database,dbexporter,laravel

-------



In this article I'll go over my [Database Exporter](https://github.com/nWidart/DbExporter) package. Why use it, how it can be usefull in your projects and finally how to use it.

## What is DbExporter

DbExporter is a package to recreate migrations based on your current database schema. It analyses your database scruture for that purpuse. By default it takes the database that is setup in your `app/database.php` (or `config/database.php` if on laravel 5.0) file. This can be overwritten by sending an additional flag to the artisan command.


## Why use DbExporter?

So you may ask yourself why in the world would I use this package? When you're developing a Laravel application you're eager to use the migrations to create your database schema. 

And you're correct. But, as the application gets bigger, you may have times when you just want to add a column to a certain table, change a `varchar` type to `text`, etc. without having to go through the whole hassle of creating a migration file for that change, and applying the migration.

Sometimes you maybe just forget to create the migration and made a small change to a database table while completely forget the migration.

This is where my package comes in. It enables you to recreate migrations after the fact.

Don't get me wrong, I still strongly suggest to create migrations for the big parts, when you're creating tables. This is more a tool, a backup for the times when you just want to go fast to modify the database. Or when you just completely forgot the create the migration.

But this is not all! DbExporter can also export you data from the database to a seed file to reseed a staging server for instance.

### Installation

Lets start by the installation process. The package is installed with [Composer](http://getcomposer.org) by adding the following to your `require` key in the `composer.json` file:

```
"nwidart/db-exporter": "1.*"
```
And run `composer update` to get the package.

Next add the Service Provider class to you `app/config/app.php` (or `config/app.php` for laravel 5.0):

``` {.language-php}
'providers' => array(
	// ...
	'Nwidart\DbExporter\DbExportHandlerServiceProvider'
)
```
Optionally you can also publish the configuration file by running `php artisan config:publish nwidart/db-exporter`.

You're set to use the package now.

### Generating migrations using the Facade

All the functionality explained next is available via the Facade and the command line. For this article we'll go through using the Facade.

Why using the Facade you may ask? Well one possible example might be calling a certain route via a cronjob.

In a controller method or route closure you can use:

``` {.language-php}
DbExportHandler::migrate();
```
To migrate your database defined in your `app/config/database.php`. If you want to export another database you can override the setting by running the following:

``` {.language-php}
DbExportHandler::migrate('otherDatabaseToExport');
```
If you want to ignore a table you can call the ignore method:

``` {.language-php}
DbExportHandler::ignore('tableToIgnore')->migrate();
```

If you have multiple tables to ignore you can pass an array to the ignore method.

``` {.language-php}
DbExportHandler::ignore(['table1', 'table2', 'table3'])->migrate();
```

You can read the [full documentation](https://github.com/nWidart/DbExporter) to learn how to use the artisan commands to achive the same thing.

## What about the seeds?

Generating seed files is just as easy.

### Generating a seed file using the commandline

We'll first go through on how to generate a seed file with the commandline since this is going to be the most used case.

To export your database data as a seed file configured in `app/config/database.php` :

```
php artisan dbe:seeds
```

To ignore a table, same thing here, use the **--ignore flag**:

```
php artisan dbe:seeds --ignore='table1,table2'
```

### Generating a seed file using the Facade

Use the following command to export your database data as a seed file:

``` {.language-php}
DbExportHandler::seed();
```
To ignore a table:

``` {.language-php}
DbExportHandler::ignore('tableAIgnorer')->seed();
```

Again, you can send an array to the ignore method to ignore multiple tables. By default the migrations table is ignored.

## Conclusion

With the **DbExporter** package you can control the structure of your database on multiple environments with ease, just as the data that goes with it.

If you encounter any bug / pull request / idea, please do not hesitate to post a bug report on the [issues](https://github.com/nWidart/DbExporter/issues) part of the GitHub Repository. 




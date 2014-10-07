@extends('layouts.master')

@section('title')
Projects | @parent
@stop

@section('content')
<div class="row">
    <div class="col-md-7">
        <h2>
            Main projects
            <a href="https://github.com/nWidart" target="_blank" class="btn btn-sm pull-right btn-primary"><i class="glyphicon glyphicon-share-alt"></i> View all my projects on GitHub</a>
        </h2>
        <ul class="bullet">
            <li>
                <a href="https://github.com/nWidart/DbExporter" target="_blank">DbExporter</a><br/>
                A Laravel package to export your database structure as a migration file.
            </li>
            <li>
                <a href="https://github.com/nWidart/HttpStatus-l4-package" target="_blank">HttpStatus</a><br/>
                A package to quickly add error pages (403, 404, 500 and 503) to your website.
            </li>
            <li>
                <a href="https://github.com/nWidart/activity" target="_blank">Activity</a><br/>
                Activity lets you list your current activity on Github. Soon from Bitbucket as well.
            </li>
            <li>
                <a href="https://github.com/nWidart/Modules" target="_blank">Modules</a><br/>
                A package to quickily create the structure for modules in Laravel.</li>
            <li>
                <a href="https://github.com/nWidart/Laravel-forecast" target="_blank">Laravel-forecast</a><br/>
                Laravel-forecast provides a service provider and a facade arround the Forecast-php wrapper.
            </li>
            <li>
                <a href="https://github.com/nWidart/projectLister" target="_blank">Project Lister</a><br/>
                A package to easily list your projects from Github, Bitbucket or Sourceforge.
            </li>
        </ul>
        <h2>Side projects websites</h2>
        <ul class="bullet">
            <li>
                <a href="http://forum.tplpc.com" target="_blank">Tout Pour Le PC</a>
            </li>
        </ul>
        <h2>
            Modules Project
            <a href="https://github.com/nWidart-Modules" target="_blank" class="btn btn-sm pull-right btn-primary"><i class="glyphicon glyphicon-share-alt"></i> View the modules project on GitHub</a>
        </h2>
        <p class="small">The modules project is a project I started early september 2014. Its goal is to have a collection of independent modules which together, create an admin dashboard very quickly. I've created a seperate organisation on github named <a href="https://github.com/nWidart-Modules" target="_blank">nWidart-Modules</a> which contains all my current modules. Here is a list of the modules I've developed so far:</p>
        <ul class="bullet">
            <li>
                <a href="https://github.com/nWidart-Modules/Core" target="_blank">Core</a>
            </li>
            <li>
                <a href="https://github.com/nWidart-Modules/Dashboard" target="_blank">Dashboard</a>
            </li>
            <li>
                <a href="https://github.com/nWidart-Modules/Session" target="_blank">Session</a>
            </li>
            <li>
                <a href="https://github.com/nWidart-Modules/User" target="_blank">User</a>
            </li>
            <li>
                <a href="https://github.com/nWidart-Modules/Workshop" target="_blank">Workshop</a>
            </li>
            <li>
                <a href="https://github.com/nWidart-Modules/Blog" target="_blank">Blog</a>
            </li>
        </ul>
    </div>
    <div class="col-md-4">
        <h2>Latest Activity</h2>
        <ul class="activity">
            <?php foreach($activities as $activity): ?>
                <li>
                    <img src="{{ $activity['actor_avatar'] }}" alt="" width="40" class="pull-left actorAvatar"/>
                    <span class="timeAgo">About {{ $activity['time'] }}</span>
                    <a href="http://github.com/{{ $activity['actor'] }}" target="_blank">{{ $activity['actor'] }}</a>
                    {{ $activity['verb'] }}
                    <a href="{{ $activity['target'] }}" target="_blank">{{ $activity['action_object'] }}</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="col-md-4">
        <h2>Projects I contributed to</h2>
        <ul class="bullet">
            <li>
                <a href="https://github.com/KnpLabs/php-github-api" target="_blank">Php Github Api</a><br/>
                This is a Github API made by Knp-Labs.
            </li>
            <li>
                <a href="https://github.com/pingpong-labs/modules" target="_blank">Modules</a><br/>
                A very interesting package to separate your app logic into modules.
            </li>
            <li>
                <a href="https://github.com/pingpong-labs/modules" target="_blank">Twitter l4</a><br/>
                A PHP Twitter API wrapper for laravel.
            </li>
            <li>
                <a href="https://github.com/dineshrabara/barcode" target="_blank">Barcode</a><br/>
                A package to generate all types of barcodes.
            </li>
        </ul>
    </div>
</div>
<div class="row">

</div>
@stop

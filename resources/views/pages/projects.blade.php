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
                <a href="https://github.com/nWidart/Laravel-broadway" target="_blank">Laravel Broadway</a><br/>
                This is an adapter packge to use <a href="https://github.com/qandidate-labs/broadway">Broadway</a> inside Laravel. Broadway is an infrastructure and testing helpers for creating CQRS and event sourced applications.

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
            AsgardCMS
            <a href="http://www.asgardcms.com" target="_blank" class="btn btn-sm pull-right btn-primary"><i class="glyphicon glyphicon-share-alt"></i> Go to AsgardCMS website</a>
        </h2>
        <p class="small">The AsgardCMS project is a project I started early september 2014. Its goal is to have a collection of independent modules which together, create an admin dashboard very quickly. After a couple of months of development I saw an opportunity to create an open source content management system, which became AsgardCMS. Indeed the laravel community lacks complete and modular <em>open source</em> CMSs.</p>
        <p class="small">The main <a href="https://github.com/nWidart-Modules/Platform" target="_blank">platform application</a> (private while in beta) can be used to install the complete CMS easily.</p>
        <p class="small">Here is a list of the independent modules I've developed so far:</p>
        <ul class="bullet">
            <li>
                <a href="https://github.com/AsgardCMS/Core" target="_blank">Core</a>
            </li>
            <li>
                <a href="https://github.com/AsgardCMS/Dashboard" target="_blank">Dashboard</a>
            </li>
            <li>
                <a href="https://github.com/AsgardCMS/User" target="_blank">User</a>
            </li>
            <li>
                <a href="https://github.com/AsgardCMS/Workshop" target="_blank">Workshop</a>
            </li>
            <li>
                <a href="https://github.com/AsgardCMS/Page" target="_blank">Page</a>
            </li>
            <li>
                <a href="https://github.com/AsgardCMS/Menu" target="_blank">Menu</a>
            </li>
            <li>
                <a href="https://github.com/AsgardCMS/Media" target="_blank">Media</a>
            </li>
            <li>
                <a href="https://github.com/AsgardCMS/Blog" target="_blank">Blog</a>
            </li>
        </ul>
    </div>
    <div class="col-md-4">
        <h3>Latest Activity</h3>
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
        <h3>Projects I contributed to</h3>
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

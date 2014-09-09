@extends('layouts.master')

@section('title')
Projects | @parent
@stop

@section('content')
<h1>Projects</h1>

<h2>Main projects</h2>
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
        <a href="https://github.com/nWidart/projectLister" target="_blank">Project Lister</a><br/>
        A package to easily list your projects from Github, Bitbucket or Sourceforge.
    </li>
    <li>
        <a href="https://github.com/nWidart/Modules" target="_blank">Modules</a><br/>
        A package to quickily create the structure for modules in Laravel.</li>
    <li>
        <a href="https://github.com/nWidart/Laravel-forecast" target="_blank">Laravel-forecast</a><br/>
        Laravel-forecast provides a service provider and a facade arround the Forecast-php wrapper.
    </li>
</ul>

<h2>Side projects websites</h2>

<ul class="bullet">
    <li>
        <a href="http://forum.tplpc.com">Tout Pour Le PC</a>
    </li>
</ul>

<a href="https://github.com/nWidart" target="_blank" class="btn btn-primary"><i class="glyphicon glyphicon-share-alt"></i> View all my projects on GitHub</a>

<h2>Latest Activity</h2>
<ul>
    <?php foreach($repositories as $repository): ?>
        <li>{{ $repository['name'] }}</li>
    <?php endforeach; ?>
</ul>
@stop

@extends('layouts.master')

@section('title')
Projects | @parent
@stop

@section('content')
<h1>Projects</h1>

<h2>Main projects</h2>
<ul>
    <li><a href="https://github.com/nWidart/DbExporter">DbExporter</a>
    A Laravel package to export your database structure as a migration file.</li>
    <li><a href="https://github.com/nWidart/HttpStatus-l4-package">HttpStatus</a>
    A package to quickly add error pages (403, 404, 500 and 503) to your website.</li>
    <li><a href="https://github.com/nWidart/projectLister">Project Lister</a>
    A package to easily list your projects from Github, Bitbucket or Sourceforge.</li>
    <li><a href="https://github.com/nWidart/Modules">Modules</a>
    A package to quickily create the structure for modules in Laravel.</li>
    <li><a href="https://github.com/nWidart/Laravel-forecast">Laravel-forecast</a>
    Laravel-forecast provides a service provider and a facade arround the Forecast-php wrapper.</li>
</ul>
@stop

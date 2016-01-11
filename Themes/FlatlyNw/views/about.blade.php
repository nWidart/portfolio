@extends('layouts.master')

@section('title')
    {{ $page->title }} | @parent
@stop
@section('meta')
    <meta name="title" content="{{ $page->meta_title}}" />
    <meta name="description" content="{{ $page->meta_description }}" />
@stop

@section('content')
    <div class="row">
        <h1>{{ $page->title }}</h1>
        {!! $page->body !!}
    </div>
    <div class="row">
        <div class="col-md-6">
            <h2>Skills</h2>
            <ul class="bullet">
                <li>PHP</li>
                <li>Laravel</li>
                <li>Clean code (SOLID principles, clean architecture, ...)</li>
                <li>ElasticSearch</li>
                <li>Doctrine ORM</li>
                <li>Domain Driven Design</li>
                <li>Git/Svn Source Control</li>
                <li>E-commerce websites</li>
                <li>Wordpress</li>
                <li>HTML5/CSS5 & javascript (jQuery)</li>
                <li>Basic server management & unix commands</li>
            </ul>
        </div>
        <div class="col-md-6">
            <h2>Find me on</h2>
            <ul class="bullet">
                <li>
                    <a href="https://github.com/nWidart" target="_blank">Github</a>
                </li>
                <li>
                    <a href="http://be.linkedin.com/pub/nicolas-widart/25/7ab/a63" target="_blank">LinkedIn</a>
                </li>
                <li>
                    <a href="http://twitter.com/nicolaswidart" target="_blank">Twitter</a>
                </li>
            </ul>

        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h2>Download</h2>
            <ul class="no-padding">
                <li>
                    <a href="{{ asset('cv/Nicolas Widart CV_EN.pdf') }}" target="_blank"><i class="glyphicon glyphicon-circle-arrow-down"></i> My Curriculum Vitae in English</a>
                </li>
                <li>
                    <a href="{{ asset('cv/Nicolas Widart CV_FR.pdf') }}" target="_blank"><i class="glyphicon glyphicon-circle-arrow-down"></i> My Curriculum Vitae in French</a>
                </li>
                <li>
                    <a href="{{ asset('cv/Nicolas Widart CV_NL.pdf') }}" target="_blank"><i class="glyphicon glyphicon-circle-arrow-down"></i> My Curriculum Vitae in Dutch</a>
                </li>
            </ul>
        </div>
    </div>
@stop

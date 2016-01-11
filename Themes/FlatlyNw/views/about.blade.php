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
        <img src="//www.gravatar.com/avatar/{{ md5('n.widart@gmail.com') }}?size=200" alt="Nicolas Widart Profile picture" class="img-circle pull-right" style="width: 20%;"/>
        {!! $page->body !!}
    </div>
    <div class="row">
        <div class="col-md-6">
            <h2>Skills</h2>
            <ul class="bullet">
                <li>PHP</li>
                <li>Laravel</li>
                <li>Clean code (SOLID principles, clean architecture, ...)</li>
                <li>Elasticsearch</li>
                <li>Doctrine ORM</li>
                <li>MongoDb</li>
                <li>Postgres</li>
                <li>Redis</li>
                <li>Beanstalk</li>
                <li>Domain Driven Design</li>
                <li>Git/Svn Source Control</li>
                <li>E-commerce websites</li>
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
                    <a href="{{ asset('assets/media/nicolas-widart-cv-en.pdf') }}" target="_blank"><i class="glyphicon glyphicon-circle-arrow-down"></i> My Curriculum Vitae in English</a>
                </li>
                <li>
                    <a href="{{ asset('assets/media/nicolas-widart-cv-fr.pdf') }}" target="_blank"><i class="glyphicon glyphicon-circle-arrow-down"></i> My Curriculum Vitae in French</a>
                </li>
                <li>
                    <a href="{{ asset('assets/media/nicolas-widart-cv-nl.pdf') }}" target="_blank"><i class="glyphicon glyphicon-circle-arrow-down"></i> My Curriculum Vitae in Dutch</a>
                </li>
            </ul>
        </div>
    </div>
@stop

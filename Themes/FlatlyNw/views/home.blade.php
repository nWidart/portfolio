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
        <div class="jumbotron">
            <img src="//www.gravatar.com/avatar/{{ md5('n.widart@gmail.com') }}?size=150" alt="Nicolas Widart Profile picture" class="img-circle pull-right pull-top"/>
            <h1>Hi,</h1>
            <p>My name is Nicolas Widart, and I'm a freelance <strong>web developer</strong> and <strong>consultant</strong>. I love the <a href="http://www.laravel.com" target="_blank">Laravel</a> framework and new technologies.</p>
            <p>
                <a class="btn btn-primary btn-lg" href="">Learn more about me</a>
                <a class="btn btn-primary btn-lg" href="">View my work</a>
                <a class="btn btn-primary btn-lg" href="">Hire Me!</a>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h1>Recent blog posts</h1>

        </div>

@stop

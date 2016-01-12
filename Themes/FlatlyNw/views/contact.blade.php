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
        <div class="col-md-8">
            <h1>Contact me</h1>
            {!! $page->body !!}
        </div>
        <div class="col-md-4">
            <h2>Contact platforms</h2>
            <ul class="bullet">
                <li>
                    <a href="mailto:n.widart@gmail.com"><i class="fa fa-envelope"></i> n.widart@gmail.com</a>
                </li>
                <li>
                    <a href="skype:live:n.widart"><i class="fa fa-skype"></i> live:n.widart</a>
                </li>
                <li>
                    <a href="https://github.com/nWidart" target="_blank"><i class="fa fa-github"></i> Github</a>
                </li>
                <li>
                    <a href="http://be.linkedin.com/pub/nicolas-widart/25/7ab/a63" target="_blank"><i class="fa fa-linkedin"></i> LinkedIn</a>
                </li>
                <li>
                    <a href="http://twitter.com/nicolaswidart" target="_blank"><i class="fa fa-twitter"></i> Twitter</a>
                </li>
            </ul>
        </div>
    </div>
@stop

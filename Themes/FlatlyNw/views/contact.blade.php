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
        <div class="col-md-12">
            <h1>Contact me</h1>
            {!! $page->body !!}
            <ul class="bullet">
                <li>Email: <a href="mailto:n.widart@gmail.com">n.widart@gmail.com</a></li>
                <li>Skype: <a href="skype:live:n.widart">live:n.widart</a></li>
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
@stop

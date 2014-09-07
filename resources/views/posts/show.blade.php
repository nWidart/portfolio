@extends('layouts.master')

@section('title')
{{ $post->title }} | @parent
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        <span class="linkBack">
            <a href="{{ URL::route('blog.index') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back to post list</a>
        </span>
        <h1>{{ $post->title }}</h1>
        <span class="date">Posted on {{ $post->date }}</span>

        {{ $post->content }}
    </div>
</div>
@stop
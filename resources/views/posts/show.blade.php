@extends('layouts.master')

@section('title')
{{ $post->title }} | @parent
@stop

@section('content')
<h1>{{ $post->title }}</h1>

{{ $post->content }}
@stop
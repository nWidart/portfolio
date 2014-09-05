@extends('layouts.master')

@section('content')
<h1>{{ $post->title }}</h1>

{{ $post->content }}
@stop
@extends('layouts.master')

@section('title')
Blog | @parent
@stop

@section('content')
<ul>
    <?php foreach($posts as $post): ?>
        <li>
            <span class="date">{{ $post->date }}</span>
            <h3><a href="{{ URL::route('blog.show', $post->slug ); }}">{{ $post->title; }}</a></h3>
        </li>
    <?php endforeach; ?>
</ul>
@stop
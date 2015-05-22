@extends('layouts.master')

@section('title')
{{ $post->title }} | @parent
@stop

@section('meta')
<?php if ($post->metaDescription): ?>
    <meta name="description" content="{{ $post->metaDescription }}"/>
<?php else : ?>
@parent
<?php endif; ?>
@stop

@section('content')
<div class="row post">
    <div class="col-lg-12">
        <span class="linkBack">
            <a href="{{ URL::route('blog.index') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back to post list</a>
        </span>
        <h1>{{ $post->title }}</h1>
        <span class="date">Posted on {{ $post->date->format('d-m-Y') }}</span>

        {!! $post->content !!}
    </div>
</div>
<div class="row">
    <p>
        <strong>I'm available to work on new projects starting September! <a href="{{ URL::route('about') }}">Get in touch!</a></strong>
    </p>
</div>
<div class="row">
    <div class="col-lg-12">
        <div id="disqus_thread"></div>
        <button class="showDisqus btn btn-primary" style="display: block; margin: 0 auto;">Show comments</button>
    </div>
</div>
@stop

@section('scripts')
    <?php if (App::environment() == 'production'): ?>
    <script>
    $(document).ready(function() {
        $('.showDisqus').on('click', function() {
            var disqus_shortname = 'nicolaswidart';

            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);

             $(this).fadeOut();
        });
    });
    </script>
    <?php endif; ?>
@stop

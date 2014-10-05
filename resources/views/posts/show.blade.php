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
<div class="row">
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
    <div class="col-lg-12">
        <div id="disqus_thread"></div>
        <button class="showDisqus btn btn-primary" style="display: block; margin: 0 auto;">Show comments</button>
    </div>
</div>
@stop

@section('scripts')
<script>
$(document).ready(function() {
	$('.showDisqus').on('click', function() {
		var disqus_shortname = 'nicolaswidart';
		$.ajax({
	         type: "GET",
	         url: "http://" + disqus_shortname + ".disqus.com/embed.js",
	         dataType: "script",
	         cache: true
	     });
	     $(this).fadeOut();
	});
});
</script>
@stop
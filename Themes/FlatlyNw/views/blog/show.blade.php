@extends('layouts.master')

@section('title')
    {{ $post->title }} | @parent
@stop

@section('styles')
    {!! Theme::style('css/prism.css') !!}
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
        <span class="linkBack">
            <a href="{{ route($currentLocale . '.blog') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back to post list</a>
        </span>
        <h1>{{ $post->title }}</h1>
        <span class="date">{{ $post->created_at->format('d-m-Y') }}</span>

        {!! $post->present()->content !!}

        <div class="alert alert-success">
            {!! Block::get('cta-hire') !!}
        </div>
        <p>
            <?php if ($previous = $post->present()->previous): ?>
                <a href="{{ route(locale() . '.blog.slug', [$previous->slug]) }}"><i class="fa fa-angle-double-left" aria-hidden="true"></i> {{ $previous->title }}</a>
            <?php endif; ?>
            <?php if ($next = $post->present()->next): ?>
                <a href="{{ route(locale() . '.blog.slug', [$next->slug]) }}" class="pull-right">{{ $next->title }} <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
            <?php endif; ?>
        </p>
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
    {!! Theme::script('js/prism.js') !!}
    <?php if (app()->environment() === 'production'): ?>
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

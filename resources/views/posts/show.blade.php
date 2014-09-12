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
        <span class="date">Posted on {{ $post->date->format('d-m-Y') }}</span>

        {!! $post->content !!}
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
            <div id="disqus_thread"></div>
            <script type="text/javascript">
                /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
                var disqus_shortname = 'nicolaswidart'; // required: replace example with your forum shortname

                /* * * DON'T EDIT BELOW THIS LINE * * */
                (function() {
                    var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                    dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

    </div>
</div>
@stop

@section('scripts')
@stop
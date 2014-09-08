@extends('layouts.master')

@section('content')
<div class="row">
    <div class="jumbotron">
      <img src="//www.gravatar.com/avatar/{{ md5('n.widart@gmail.com') }}?size=150" alt="Nicolas Widart Profile picture" class="img-circle pull-right pull-top"/>
      <h1>Hi,</h1>
      <p>My name is Nicolas Widart, and I'm a <strong>web developper</strong>. I love the <a href="http://www.laravel.com" target="_blank">Laravel</a> framework and new technologies.</p>
      <p><a class="btn btn-primary btn-lg" href="{{ URL::route('about') }}">Learn more about me</a></p>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1>Recent blog posts</h1>
        <ul>
            <?php foreach($posts as $post): ?>
                <li>
                    <span class="date">{{ $post->date }}</span>
                    <h3>
                        <a href="{{ URL::route('blog.show', $post->slug ); }}"><?php echo $post->status == 'draft' ? '[Draft]' : ''; ?> {{ $post->title; }}</a>
                    </h3>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
@stop
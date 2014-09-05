@extends('layouts.master')

@section('content')
<div class="row">
    <div class="jumbotron">
      <img src="//www.gravatar.com/avatar/{{ md5('n.widart@gmail.com') }}?size=150" alt="" class="rounded pull-right"/>
      <h1>Hi,</h1>
      <p>My name is Nicolas Widart, and I'm a <strong>web developper</strong>. I love the <a href="www.laravel.com">Laravel</a> framework and new technologies.</p>
      <p><a class="btn btn-primary btn-lg">Learn more about me</a></p>
    </div>
</div>
@stop
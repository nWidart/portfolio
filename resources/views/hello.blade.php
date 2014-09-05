@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <h1>Welcome</h1>
        <img src="//www.gravatar.com/avatar/{{ md5('n.widart@gmail.com') }}" alt=""/>
    </div>
</div>
@stop
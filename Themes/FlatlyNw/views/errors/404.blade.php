@extends('layouts.master')

@section('title')
    404 Not Found | @parent
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Page Not Found. <a href="{{ route('homepage') }}">Back to homepage</a></h1>
        </div>
    </div>
@stop

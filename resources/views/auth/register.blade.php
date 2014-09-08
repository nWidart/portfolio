@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-3">
        <h1>Register</h1>

        @include('partials.errors')
        {{ Form::open() }}
            <div class="form-group">
                {{ Form::label('email', 'Email:') }}
                {{ Form::email('email', Input::old('email'), ['class' => 'form-control', 'placeholder' => 'Email']) }}
            </div>

            <div class='form-group'>
                {{ Form::label('password', 'Password:') }}
                {{ Form::password('password', ['class' => 'form-control']) }}
            </div>

            <div class='form-group'>
                {{ Form::label('password_confirmation', 'Password Confirmation:') }}
                {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
            </div>

            <div class='form-group'>
                {{ Form::submit('Register', ['class' => 'btn btn-primary form-control']) }}
            </div>
        {{ Form::close() }}
    </div>
</div>
@stop
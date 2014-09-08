@extends('layouts.master')

@section('content')
    <h1>Login</h1>

    <?php if ($errors->any()): ?>
        <ul>
            <?php foreach($errors->all() as $error): ?>
                <li>{{ $error }}</li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    {{ Form::open() }}
    	<div class='form-group'>
    	    {{ Form::label('email', 'Email:') }}
    	    {{ Form::email('email', Input::old('email'), ['class' => 'form-control', 'placeholder' => 'Email']) }}
    	</div>
    	<div class='form-group'>
    	    {{ Form::label('password', 'Password:') }}
    	    {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
    	</div>

    	<div class='form-group'>
    	    {{ Form::submit('Login', ['class' => 'btn btn-primary form-control']) }}
    	</div>
    {{ Form::close() }}
@stop
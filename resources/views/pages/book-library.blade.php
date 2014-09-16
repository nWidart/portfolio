@extends('layouts.master')

@section('title')
Book library | @parent
@stop

@section('content')
<div class="row">
    <div class="col-md-6">
        <h2>Books I've read</h2>
        <ul class="book-list">
            <?php foreach($read as $book): ?>
                <li class="group">
                    <img src="{{ asset($book->cover) }}" alt="{{ $book->title }}" class="pull-left book-cover"/>
                    <h3><a href="{{ $book->link }}" target="_blank">{{ $book->title}}</a></h3>
                    <span class="author">By {{ $book->author }}</span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="col-md-6">
        <h2>Currently reading...</h2>
        <ul class="book-list">
            <?php foreach($reading as $book): ?>
                <li class="group">
                    <img src="{{ asset($book->cover) }}" alt="{{ $book->title }}" class="pull-left book-cover"/>
                    <h3><a href="{{ $book->link }}" target="_blank">{{ $book->title}}</a></h3>
                    <span class="author">By {{ $book->author }}</span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md12">
        <h2>Books I'm going to read</h2>
        <ul class="book-list">
            <?php foreach($toRead as $book): ?>
                <li class="pull-left">
                    <a href="{{ $book->link }}" target="_blank">
                        <img src="{{ asset($book->cover) }}" alt="{{ $book->title }}" class="book-cover"/>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
@stop

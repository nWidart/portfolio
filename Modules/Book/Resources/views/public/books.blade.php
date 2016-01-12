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
                    <?php if ($book->cover): ?>
                    <img src="{{ $book->cover->path }}" alt="{{ $book->name }}" class="pull-left book-cover"/>
                    <?php endif; ?>
                    <h3><a href="{{ $book->url }}" target="_blank">{{ $book->name}}</a></h3>
                    <span class="author">By {{ $book->author_name }}</span>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="col-md-6">
            <h2>Currently reading...</h2>
            <ul class="book-list">
                <?php foreach($reading as $book): ?>
                    <li class="group">
                        <?php if ($book->cover): ?>
                            <img src="{{ $book->cover->path }}" alt="{{ $book->name }}" class="pull-left book-cover"/>
                        <?php endif; ?>
                        <h3><a href="{{ $book->url }}" target="_blank">{{ $book->name}}</a></h3>
                        <span class="author">By {{ $book->author_name }}</span>
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
                    <?php if ($book->cover): ?>
                        <a href="{{ $book->url }}" target="_blank" data-toggle="tooltip" data-placement="top" title="{{ $book->name }}">
                            <img src="{{ $book->cover->path }}" alt="{{ $book->name }}" class="book-cover"/>
                        </a>
                    <?php endif; ?>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@stop

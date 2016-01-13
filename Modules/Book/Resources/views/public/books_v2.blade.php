@extends('layouts.master')

@section('title')
    Book library | @parent
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h2>Currently reading...</h2>
            <div class="grid">
                <ul class="book-list">
                    <?php foreach($reading as $book): ?>
                    <li class="pull-left grid-item">
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
        <div class="col-md-6">
            <h2>Books I've read</h2>
            <div class="grid">
                <ul class="book-list">
                    <?php foreach($read as $book): ?>
                        <li class="pull-left grid-item" style="margin-bottom: 20px">
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
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2>Books I'm going to read</h2>
            <div class="grid">
                <ul class="book-list">
                    <?php foreach($toRead as $book): ?>
                    <li class="pull-left grid-item">
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
    </div>
@stop

@section('scripts')
    {!! Theme::script('js/masonry.pkgd.min.js') !!}
    <script>
        $( document ).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
        $( document ).load(function() {
            $('.grid').masonry({
                // options
                itemSelector: '.grid-item',
                "gutter": 20,
                percentPosition: true
            });
        });
    </script>
@stop

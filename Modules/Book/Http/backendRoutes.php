<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/book'], function (Router $router) {
    $router->bind('books', function ($id) {
        return app('Modules\Book\Repositories\BookRepository')->find($id);
    });
    get('books', ['as' => 'admin.book.book.index', 'uses' => 'BookController@index']);
    get('books/create', ['as' => 'admin.book.book.create', 'uses' => 'BookController@create']);
    post('books', ['as' => 'admin.book.book.store', 'uses' => 'BookController@store']);
    get('books/{books}/edit', ['as' => 'admin.book.book.edit', 'uses' => 'BookController@edit']);
    put('books/{books}/edit', ['as' => 'admin.book.book.update', 'uses' => 'BookController@update']);
    delete('books/{books}', ['as' => 'admin.book.book.destroy', 'uses' => 'BookController@destroy']);
    $router->bind('statuses', function ($id) {
        return app('Modules\Book\Repositories\StatusRepository')->find($id);
    });
    get('statuses', ['as' => 'admin.book.status.index', 'uses' => 'StatusController@index']);
    get('statuses/create', ['as' => 'admin.book.status.create', 'uses' => 'StatusController@create']);
    post('statuses', ['as' => 'admin.book.status.store', 'uses' => 'StatusController@store']);
    get('statuses/{statuses}/edit', ['as' => 'admin.book.status.edit', 'uses' => 'StatusController@edit']);
    put('statuses/{statuses}/edit', ['as' => 'admin.book.status.update', 'uses' => 'StatusController@update']);
    delete('statuses/{statuses}', ['as' => 'admin.book.status.destroy', 'uses' => 'StatusController@destroy']);
// append


});

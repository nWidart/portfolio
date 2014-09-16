<?php

Route::get('/', 'HomeController@index');

Route::resource('blog', 'PostsController');

Route::get('about', ['as' => 'about', 'uses' => 'AboutController@index']);

Route::get('projects', ['as' => 'projects', 'uses' => 'ProjectsController@index']);

Route::get('book-library', ['as' => 'library', 'uses' => 'BookController@index']);

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

/*
|--------------------------------------------------------------------------
| View Composer listeners
|--------------------------------------------------------------------------
*/
View::composer('partials.footer', 'Nwidart\Composers\FooterComposer');
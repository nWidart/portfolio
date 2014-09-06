<?php

Route::get('/', 'HomeController@index');

Route::resource('blog', 'PostsController');

Route::get('about', ['as' => 'about', 'uses' => 'AboutController@index']);

Route::get('projects', ['as' => 'projects', 'uses' => 'ProjectsController@index']);

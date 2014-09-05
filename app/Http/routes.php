<?php

Route::get('/', 'HomeController@index');

Route::resource('blog', 'PostsController');

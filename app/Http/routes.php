<?php

Route::get('home', 'HomeController@index');
Route::get('/dvds/search', 'dvdsController@search');
Route::get('/dvds', 'dvdsController@results');

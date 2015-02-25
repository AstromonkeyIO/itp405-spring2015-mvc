<?php

Route::get('home', 'HomeController@index');
Route::get('/dvds/search', 'dvdsController@search');
Route::get('/dvds', 'dvdsController@results');
//Route::get('/dvds/reviews', 'dvdsController@reviews');

Route::post('/dvds/{id}', 'dvdsController@addReview');
Route::get('/dvds/{id}', 'dvdsController@reviews');

//Route::post('/dvds/reviews', 'dvdsController@reviews');
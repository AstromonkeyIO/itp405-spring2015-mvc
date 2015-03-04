<?php

Route::get('home', 'HomeController@index');
Route::get('/dvds/search', 'dvdsController@search');
Route::get('/dvds', 'dvdsController@results');
//Route::get('/dvds/reviews', 'dvdsController@reviews');

Route::get('/dvds/create', 'dvdsController@create');
Route::post('/dvds/', 'dvdsController@postDVD');


Route::get('/genres/{genre_name}/dvds', 'dvdsController@searchByGenre'); 

Route::post('/dvds/{id}', 'dvdsController@addReview');
Route::get('/dvds/{id}', 'dvdsController@reviews');


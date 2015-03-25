<?php
//use App\Services\RottenTomatoes;
use App\Services\RottenTomatoes;

Route::get('home', 'HomeController@index');
Route::get('/dvds/search', 'dvdsController@search');
Route::get('/dvds', 'dvdsController@results');
//Route::get('/dvds/reviews', 'dvdsController@reviews');

Route::get('/dvds/create', 'dvdsController@create');
Route::post('/dvds/', 'dvdsController@postDVD');


Route::get('/genres/{genre_name}/dvds', 'dvdsController@searchByGenre'); 

Route::post('/dvds/{id}', 'dvdsController@addReview');
Route::get('/dvds/{id}', 'dvdsController@reviews');

Route::get('rottentomato/{searchTerm?}', function($searchTerm) {
 
   $rottenTomatoes = new RottenTomatoes(); 
   $movies = $rottenTomatoes->search($searchTerm); 
 
  return view('rottentomato', [
    'rottenTomatoData' => $movies,
    'noData' => ''
  ]); 
      
   /* 
   if(Cache::has("rottentomato-$searchTerm")) {
       
       $jsonString = Cache::get("rottentomato-$searchTerm");
       
   } 
   else 
   {
      
       $url = "http://api.rottentomatoes.com/api/public/v1.0/movies.json?page=1&apikey=96j4rz4a9qc5rmd5ratvqxym&q=$searchTerm";     
       if(!$url) {
            return view('rottentomato', [
            'noData' => "No Movies Found"
           ]);  
       }
       
       $jsonString = file_get_contents($url);
       Cache::put("rottentomato-$searchTerm", $jsonString, 60);
   
   }
   
   $rottenTomatoData = json_decode($jsonString);

       
  return view('rottentomato', [
    'rottenTomatoData' => $rottenTomatoData->movies,
    'noData' => ''
  ]); 
   */
   
   
    
});
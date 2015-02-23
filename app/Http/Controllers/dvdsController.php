<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;//must start the root
use App\Models\dvdQuery;
use App\Models\genresQuery;
use App\Models\ratingsQuery;

class dvdsController extends Controller {
    
   public function search()
   {
       $queryGenres = new genresQuery();
       $genres = $queryGenres->getGenres();
       
       $queryRatings = new ratingsQuery();
       $ratings = $queryRatings->getRatings();
       
       return view('search', ['genres' => $genres, 'ratings' => $ratings]);
   }
   
   public function results(Request $request)
   {
       /*
       if(!$request->input('dvd_title')) {
           return redirect('/dvds/search');
       }
      */
       $query = new dvdQuery();
       $dvds = $query->search($request->input('dvd_title'), $request->input('genres'), $request->input('ratings'));
               
       return view('results', ['dvd_title' => $request->input('dvd_title'),
           'dvds' => $dvds, 'rating' => $request->input('ratings'), 'genre' => $request->input('genres')   
           ]);
   }
    
}



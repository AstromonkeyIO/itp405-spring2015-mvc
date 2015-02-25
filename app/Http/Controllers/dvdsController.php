<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;//must start the root
use App\Models\dvdQuery;
use App\Models\genresQuery;
use App\Models\ratingsQuery;
use App\Models\reviewsQuery;
use App\Models\addNewDVD;

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
   
   public function reviews($id) {
       
       
       $query = new reviewsQuery();
       $reviews = $query->getReviews($id);
               
       return view('reviews', ['dvd_id' => $id, 'reviews' => $reviews]);
   }
   
   public function addReview(Request $request, $id) {

     //dd($id);
    $validation = addNewDVD::validate([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'rating' => $request->input('rating'),
            'dvd_id' => $id
        ]);

    if($validation->passes()) {
        addNewDVD::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'rating' => $request->input('rating'),
            'dvd_id' => $id
        ]);

        return redirect('dvds/'.$id)->with('success', 'DVD successfully saved!');

    } else {

        return redirect('/dvds/'.$id)
                ->withInput()
                ->withErrors($validation);

    }

}

   
    
}



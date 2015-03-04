<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;//must start the root
use App\Models\dvdQuery;
use App\Models\genresQuery;
use App\Models\ratingsQuery;
use App\Models\reviewsQuery;
use App\Models\addNewDVD;

//use App\Models\Song;
//use App\Models\Artist;
use App\Models\Dvd;
use App\Models\Format;
use App\Models\Genre;
use App\Models\Label;
use App\Models\Rating;
use App\Models\Sound;



class dvdsController extends Controller {
    
    public function create() 
    {

        $formats = Format::all();
        $genres = Genre::all();
        $labels = Label::all();
        $ratings = Rating::all();
        $sounds = Sound::all();
    
        return view('create', ['formats' => $formats, 'genres' => $genres, 'labels' => $labels, 'ratings' => $ratings, 'sounds' => $sounds]);       
        
    }
    
    public function postDVD(Request $request) {
        
        $dvd = new Dvd();
        $dvd->title = $request->input('title');
        $dvd->genre_id = $request->input('genre_id');
        $dvd->rating_id = $request->input('rating_id');
        $dvd->label_id = $request->input('label_id');
        $dvd->sound_id = $request->input('sound_id');        
        $dvd->format_id = $request->input('format_id'); 
        
        if($dvd->save()) {
            
            return redirect('dvds/create')->with('success', 'DVD saved');
            
        }
        else {
            
            return redirect('dvds/create')->withInput();
            
        }
        
        
    }
    
    public function searchByGenre($genre_name) {
        
        $genre = Genre::where('genre_name', '=', $genre_name)->first();
        $dvds = Dvd::with('genre', 'rating', 'label')->whereHas('genre', function($query) use ($genre_name)
        {
             $query->where('genre_name', '=', $genre_name);             
        })->get();
        
        return view('searchByGenre', ['dvds' => $dvds, 'genre' => $genre_name]);      
        
    }
    
    
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



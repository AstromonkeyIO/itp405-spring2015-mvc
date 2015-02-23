<?php namespace App\Models;
use DB;

class dvdQuery {
    
    public function search($term, $genre, $rating)
    {
       $query = DB::table('dvds')
       ->join('ratings', 'ratings.id', '=', 'dvds.rating_id')
       ->join('genres', 'genres.id', '=', 'dvds.genre_id')
       ->join('labels', 'labels.id', '=', 'dvds.label_id')
       ->join('sounds', 'sounds.id', '=', 'dvds.sound_id')
       ->join('formats', 'formats.id', '=', 'dvds.format_id');             
       if($term != "")
       {
            $query->where('title', 'LIKE', '%'. $term . '%');
       }
       if($genre != "All" && $genre != "")
       {
            $query->where('genre_name', '=', $genre );           
       }
       if($rating != "All" && $rating != "")
       {
            $query->where('rating_name', '=', $rating );            
       }

       $query->orderBy('title', 'asc');
       
       return $query->get();
    }
    
    
}

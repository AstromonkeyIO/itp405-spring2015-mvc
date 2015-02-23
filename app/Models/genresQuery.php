<?php namespace App\Models;
use DB;

class genresQuery {
    
    public function getGenres()
    {
       $query = DB::table('genres')       
       ->orderBy('genre_name', 'asc');
       
       return $query->get();
    }
     
}
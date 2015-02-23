<?php namespace App\Models;
use DB;

class ratingsQuery {
    
    public function getRatings()
    {
       $query = DB::table('ratings')       
       ->orderBy('rating_name', 'asc');
       
       return $query->get();
    }
     
}
<?php namespace App\Models;
use DB;

class reviewsQuery {
    
    public function getReviews($dvd_id)
    {
       $query = DB::table('reviews')       
       ->where('dvd_id', '=', $dvd_id)
       ->orderBy('id', 'desc');               
  
       return $query->get();
    }
     
}
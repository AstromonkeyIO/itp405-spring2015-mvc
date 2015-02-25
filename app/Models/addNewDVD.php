<?php namespace App\Models;
use DB;

class addNewDVD {

    public static function validate($input) {
        
        return \Validator::make($input, [
            'rating' => 'required',
            'title' => 'required| min:5',
            'description' => 'required| min:20',
            'dvd_id' => 'required|integer'
        ]);
        
    }
    
    public static function create($data) {
        
        return DB::table('reviews')->insert($data);
        
    }
}

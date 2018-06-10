<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Dish extends Model
{
	protected $table = "dishes";

    public function profile() {
    	return $this->belongsTo( 'App\Profile')->withDefault();
    }

    public static function latestDishes($limit) {
    	return static::latest()->limit($limit)->get();
    }
}

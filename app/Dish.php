<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Dish extends Model
{
    public function profile() {
    	return $this->belongsTo( 'App\Profile')->withDefault();
    }
}

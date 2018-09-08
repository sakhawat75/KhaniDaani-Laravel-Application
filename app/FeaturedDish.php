<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeaturedDish extends Model
{
    
    public function dish()
    {
    	return $this->belongsTo(Dish::class);
    }

}

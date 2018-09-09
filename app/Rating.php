<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    //
    protected $fillable = ['order_id', 'type', 'dish_id', 'chef_id', 'rating', 'comment'];

    public function order()		
    {
    	return $this->belongsTo( Order::class, 'order_id', 'id');
    }

    /*public function avg_rating()		
    {
    	return satic::$this->avg('rating');
    }*/
    
}

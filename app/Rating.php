<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    //
    protected $fillable = ['order_id', 'type', 'rating', 'comment'];

    public function order()		
    {
    	return $this->belongsTo( Order::class, 'order_id', 'id');
    }
    
}

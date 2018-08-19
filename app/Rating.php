<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    //
    protected $fillable = ['order_id', 'type', 'rating', 'comment'];
    
}

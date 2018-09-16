<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
	public function dish ()
	{
		return $this->belongsTo( Dish::class, 'dish_id', 'id')->withDefault();
	}

	public function dsp ()
	{
		return $this->belongsTo( DeliveryService::class, 'dsp_id', 'id')->withDefault();
	}

	public function pp ()
	{
		return $this->belongsTo( PickersPoint::class, 'pp_id', 'id')->withDefault();
	}

	public function buyer ()
	{
		return $this->belongsTo( User::class, 'buyer_user_id', 'id')->withDefault();
	}
}

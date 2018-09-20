<?php

namespace App;

use Carbon\Carbon;
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
		return $this->belongsTo( DeliveryService::class, 'dsp_id', 'id');
	}

	public function pp ()
	{
		return $this->belongsTo( PickersPoint::class, 'pp_id', 'id');
	}

	public function buyer ()
	{
		return $this->belongsTo( User::class, 'buyer_user_id', 'id')->withDefault();
	}

	public function chef ()
	{
		return $this->belongsTo( User::class, 'dish_user_id', 'id')->withDefault();
	}

    public function role()
    {
        $user_id = auth()->id();
        $role = null;
        if($user_id == $this->buyer_user_id) {
            $role = "Buyer";
        } elseif ($user_id == $this->dish_user_id) {
            $role = "Chef";
        } elseif ($user_id == $this->dsp_user_id) {
            $role = "DSP";
        } elseif ($user_id == $this->pp_user_id) {
            $role = "PP";
        }

        return $role;
	}

	public function statusInString() {
	    if($this->status == 1) {
	        return 'In Progress';
        }
        if($this->status == 2) {
            return 'Completed';
        }
        if($this->status == 3) {
            return 'Canceled';
        }
        return 'database connection failed';
    }


    public function ratings()
    {
        return $this->hasOne(Rating::class, 'order_id', 'id');
    }

}

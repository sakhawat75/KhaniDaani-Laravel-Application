<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Rating;

class RatingController extends Controller
{
    //
    public function store(Order $order, Request $request)
    {
    	if(auth()->id() == $order->buyer_user_id) {
    		$rating = Rating::updateOrCreate(
	    	    ['order_id' => $order->id],
	    	    [
                    'order_id' => $order->id,
	    	    	'chef_id' => $order->dish_user_id,
	    	    	'type' => 'dish',
	    	    	'rating' => $request->input('rating'),
	    	    	'comment' => $request->input('rating_comment'),
	    	    ]
	    	);
    	}

        $order->rating = $rating->rating;
        $order->save();
    	

    	return redirect()->back();
    }
}

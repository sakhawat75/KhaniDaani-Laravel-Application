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

    	    $validate = $request->validate([
    	        'rating' => 'required|integer|max:5|min:1',
    	        'rating_comment' => 'required|string|max:100'
            ]);

    	    if($order->status != 2) {
    	        return redirect()->back()->withErrors('Reviewing Failed');
            }

    		$rating = Rating::updateOrCreate(
	    	    ['order_id' => $order->id],
	    	    [
                    'order_id' => $order->id,
                    'chef_id' => $order->dish_user_id,
	    	    	'dish_id' => $order->dish_id,
	    	    	'type' => 'dish',
	    	    	'rating' => $request->input('rating'),
	    	    	'comment' => $request->input('rating_comment'),
	    	    ]
	    	);

            $order->rating = $rating->rating;
            $order->save();
    	}

        $order->rating = $rating->rating;
        $order->save();
        $dish = $order->dish;
        $dish->avg_rating = $dish->ratings->avg('rating');
        $dish->save();
    	

    	return redirect()->back()->with('success', 'Review Successful');
    }
}

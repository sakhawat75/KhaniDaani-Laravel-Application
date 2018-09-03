<?php

namespace App\Http\Controllers;

use App\Area;
use App\Category;
use App\City;
use App\User;
use App\Dish;
use App\Http\Resources\NotificationCollection;
use App\Order;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Notifications\NotifyDishReady;

class RestApiController extends Controller
{

	public function jsonCategories()
	{
		$categories = Category::all();
		return response()->json($categories);
	}

    public function jsonSubCat() {
    	$cat_name = Input::get('cat_name');
    	$cat_id = Category::where('name', '=', $cat_name)->first();
    	$id = $cat_id->id;
    	$subcategories = SubCategory::where('category_id', '=', $id)->get();

    	return \Response::json($subcategories);
    }


    public function jsonAreas() {
        $city_name = Input::get('city_name');
        $city_id = City::where('name', '=', $city_name)->first();
        $id = $city_id->id;
        $areas = Area::where('city_id', '=', $id)->get();

        return \Response::json($areas);
    }

	/**
	 *
	 * Search And Filter dish
	 *
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function jsonSearchDish(Request $request) {
		$dishes = Dish::query();
		if ($request->has( 'dish_category')) {
			$dish_category = $request->input('dish_category');
			if ($dish_category != '') {
				$dishes->where('dish_category', $dish_category);
			}

		}
		if ($request->has( 'dish_subcategory')) {
			$dish_subcategory = $request->input('dish_subcategory');
			if ($dish_subcategory != '') {
				$dishes->Where('dish_subcategory', $dish_subcategory);
			}

		}
	    if ($request->has( 'keyword'))
	    {
	    	$keyword = $request->input('keyword');
	    	if ($keyword != '') {
			    $dishes->where('dish_name','like', '%'. $keyword . '%');
		    }

	    }

		if ($request->has( 'min_price') && $request->has( 'max_price'))
		{
			$min_price = $request->input('min_price');
			$max_price = $request->input('max_price');
			if ($min_price > 0 && $max_price > 0) {
				$dishes->whereBetween( 'dish_price', [$min_price, $max_price]);
			}

		}

		$dishes = $dishes->with('profile')->paginate(12);

		return response()->json($dishes);
    }

    public function orderUpdate(Request $request)
    {
    	$order_id = null;
    	$order = null;

    	if ($request->has( 'order_id')) {
    		$order_id = $request->input('order_id');

    		$order = Order::find($order_id);
    		$buyer = $order->buyer;
			$dsp = $order->dsp->user;
			$chef = $order->dish->profile->user;

    		if($order->dish->profile_id == auth()->id()) {
			    if($request->has( 'chef_is_dish_ready')){

				    $order->chef_is_dish_ready = 1;
				    $order->save();
				    

				    $buyer->notify( new NotifyDishReady( $order, 'user'));
				    $chef->notify(new NotifyDishReady( $order, 'chef'));
				    $dsp->notify(new NotifyDishReady( $order, 'dsp'));

				    
			    }
		    }
		    if($order->buyer_user_id == auth()->id()) {
			    if($request->has( 'is_order_completed')){

				    $order->is_order_completed = 1;
				    $order->save();
			    }
		    }
		    if(auth()->user()->delivery_services->contains('id', $order->dsp_id)) {
			    if($request->has( 'dsp_is_dish_delivered')){

				    $order->dsp_is_dish_delivered = 1;
				    $order->save();
			    }
		    }
	    }

	    return response()->json('order updated successfully');

    }


    public function allNotification(){
	    $user = User::find(auth()->id());


	    return response()->json( $user->notifications()->simplePaginate(3));
		// return new NotificationCollection( $user->notifications);
    }

    public function get_profile_image($id) {
	    $user = User::find($id);
	    $url = $user->profile->profile_image;
	    
	    return response()->json($url);
    }
}

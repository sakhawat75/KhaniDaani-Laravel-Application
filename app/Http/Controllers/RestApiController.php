<?php

namespace App\Http\Controllers;

use App\Area;
use App\Category;
use App\City;
use App\DeliveryService;
use App\Notifications\NotifyDD;
use App\PickersPoint;
use App\User;
use App\Dish;
use App\Http\Resources\NotificationCollection;
use App\Order;
use App\SubCategory;
use Carbon\Carbon;
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


    public function jsonAreas(Request $request) {
        $city_name = $request->input('city_name');
        $city = City::where('name', '=', $city_name)->first();

        $areas = Area::where('city_id', '=', $city->id)->get();

        return $areas;
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

		if ($request->has( 'city')) {
			$city = $request->input('city');
			if ($city != '') {
				$dishes->with('profile')->whereHas('profile', function($q) use (&$city) {
					$q->where('city', $city);
				});
			}

		}

		if ($request->has( 'area')) {
			$area = $request->input('area');
			if ($area != '') {
				$dishes->with('profile')->whereHas('profile', function($q) use (&$area) {
					$q->where('area', $area);
				});
			}

		}

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


    public function jsonSearchDsp(Request $request)
    {
        $dsps = DeliveryService::query();

        if ($request->has( 'city')) {
            $city = $request->input('city');
            if ($city != '') {
                $dsps->with('profile')->whereHas('profile', function($q) use (&$city) {
                    $q->where('city', $city);
                });
            }

        }

        if ($request->has( 'area')) {
            $area = $request->input('area');
            if ($area != '') {
                $dsps->with('profile')->whereHas('profile', function($q) use (&$area) {
                    $q->where('area', $area);
                });
            }

        }

        if ($request->has( 'keyword'))
        {
            $keyword = $request->input('keyword');
            if ($keyword != '') {
                $dsps->where('service_title','like', '%'. $keyword . '%')->orWhere('service_area','like', '%'. $keyword . '%')->orWhere('id','like', '%'. $keyword . '%');
            }

        }

        $dsps = $dsps->with('profile')->paginate(12);

        return response()->json($dsps);
    }

    public function jsonSearchPP(Request $request)
    {
        $pps = PickersPoint::query();

        if ($request->has( 'city')) {
            $city = $request->input('city');
            if ($city != '') {
                $pps->with('profile')->whereHas('profile', function($q) use (&$city) {
                    $q->where('city', $city);
                });
            }

        }

        if ($request->has( 'area')) {
            $area = $request->input('area');
            if ($area != '') {
                $pps->with('profile')->whereHas('profile', function($q) use (&$area) {
                    $q->where('area', $area);
                });
            }

        }

        if ($request->has( 'keyword'))
        {
            $keyword = $request->input('keyword');
            if ($keyword != '') {
                $pps->where('name','like', '%'. $keyword . '%')->orWhere('address','like', '%'. $keyword . '%')->orWhere('id','like', '%'. $keyword . '%');
            }

        }

        $pps = $pps->with('profile')->paginate(12);

        return response()->json($pps);
    }

    public function orderUpdate(Request $request)
    {
    	$order_id = null;
    	$order = null;



    	if ($request->has( 'order_id')) {
    		$order_id = $request->input('order_id');

    		$order = Order::find($order_id);
    		$buyer = $order->buyer;

			if($order->dsp) {
                $dsp = $order->dsp->user;
            } elseif ($order->pp) {
                $dsp = $order->pp->user;
            }


			$chef = $order->dish->profile->user;

			if($order->status == 3) {
			    return $order;
            }

            /*if(Carbon::now()->diffInMinutes($order->created_at) >= 30 && $order->chef_order_approved == 0 && $order->status == 1) {
                $order->status = 3;
                $order->chef->profile->balance += $order->total_price;
                $order->chef->profile->save();
                $order->save();
                return $order;
            }*/

    		if($order->dish->profile_id == auth()->id()) {
			    if($request->has( 'chef_is_dish_ready')){

				    $order->chef_is_dish_ready = 1;
				    $order->save();
				    

				    $buyer->notify( new NotifyDishReady( $order, 'user'));
				    $chef->notify(new NotifyDishReady( $order, 'chef'));
				    $dsp->notify(new NotifyDishReady( $order, 'dsp'));

				    
			    }
                if($request->has( 'chef_order_approved')){

                        $order->chef_order_approved = $request->input('chef_order_approved');
                        if($order->chef_order_approved == 2) {
                            $order->status = 3;
                            $order->chef->profile->balance += $order->total_price;
                            $order->chef->profile->save();
                        }
                        $order->save();

                        //notify buyer and dsp

                    }
                }


		    if($order->buyer_user_id == auth()->id()) {
			    if($request->has( 'is_order_completed')){

				    $order->is_order_completed = 1;
				    $order->status = 2;
				    if($order->status == 2 && $order->is_order_completed == 1 && $order->chef_is_dish_ready == 1
                    && $order->dsp_is_dish_recieved == 1 && $order->dsp_is_dish_delivered == 1) {
                        $chef->profile->balance += $order->dish_price;
                        $chef->profile->save();
                        $dsp->profile->balance += $order->dsp_service_charge;
                        $dsp->profile->save();
                    }
				    $order->save();
			    }
                if($request->has( 'status')){

                        $order->status = $request->input('status');
                        $order->save();
                    }
                }
		    if(auth()->user()->delivery_services->contains('id', $order->dsp_id) ||
                auth()->user()->pickerspoints->contains('id', $order->pp_id)) {
			    if($request->has( 'dsp_is_dish_delivered')){

				    $order->dsp_is_dish_delivered = 1;

                    $buyer->notify( new NotifyDD( $order, 'user'));
                    $chef->notify(new NotifyDD( $order, 'chef'));
                    $dsp->notify(new NotifyDD( $order, 'dsp'));

				    $order->save();
			    }
			    if($request->has( 'dsp_is_dish_recieved')){

				    $order->dsp_is_dish_recieved = 1;
				    $order->save();
			    }
		    }
	    }

//	    return response()->json($order);

    }

    public function orderLoad(Request $request)
    {
        $order = Order::find($request->input('order_id'));

        return $order;
    }

    public function getIDs()
    {
        $dsp_ids = DeliveryService::registeredIDs();

        return $dsp_ids;
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

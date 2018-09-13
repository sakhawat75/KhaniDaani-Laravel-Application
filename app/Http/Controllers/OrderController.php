<?php

namespace App\Http\Controllers;

use App\DeliveryService;
use App\Dish;
use App\Notifications\NotifyOrder;
use App\Order;
use App\PickersPoint;
use App\SystemVariables;
use App\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
	public function selectdsp( Dish $dish ) {
	    if(auth()->id() == $dish->profile->user_id) {
	        return redirect()->back()->withErrors(['Error:', 'You can not buy your own dish']);
        }

        $dsps =   DeliveryService::where('id', $dish->dsp_1)->orWhere('id', $dish->dsp_2)->orWhere('id', $dish->dsp_3)->get();
		$pps =   PickersPoint::where('id', $dish->pp1)->orWhere('id', $dish->pp2)->orWhere('id', $dish->pp3)->get();

	    return view('order.selectdsp', compact( 'dsps', 'dish', 'pps'));
	}

	public function confirm(DeliveryService $dsp, Dish $dish) {

//     	return response()->json($dsp);
        $system = SystemVariables::first();
        $percentage = $system->service_percentage / 100;
        $khanidaani_charge = round($dish->dish_price * $percentage);
        $total = $dsp->service_charge + $dish->dish_price + $khanidaani_charge;

        return view('order.confirm', compact( 'dsp', 'dish', 'khanidaani_charge', 'system', 'total'));
	}

    public function confirm_pp (PickersPoint $pp, Dish $dish) {

//     	return response()->json($dsp);

        $system = SystemVariables::first();
        $percentage = $system->service_percentage / 100;
//        $khanidaani_charge = round(($pp->charge + $dish->dish_price) * $percentage);

        $khanidaani_charge = round($dish->dish_price * $percentage);
        $total = $pp->charge + $dish->dish_price + $khanidaani_charge;

        return view('order.confirm_pp', compact( 'pp', 'dish', 'khanidaani_charge', 'system', 'total'));
    }

	public function status(Order $order) {

		if($order->dish->profile_id == auth()->id() or $order->buyer_user_id == auth()->id()) {
			return view('order.status', compact( 'order'));
		}
		if (auth()->user()->delivery_services->contains('id', $order->dsp_id)) {
			return view('order.status', compact( 'order'));			
		}

		return redirect()->back();
	}

	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function storeOrder(Request $request)
	{
		if(auth()->id() != $request->input('buyer_user_id')) {
			return redirect()->back();
		}

		$user = User::find(auth()->id());
		$dish = Dish::find($request->input('dish_id'));
		$dsp = DeliveryService::find($request->input('dsp_id'));

		$pp = PickersPoint::find($request->input('pp_id'));
		$system = SystemVariables::first();
		$percentage = $system->service_percentage / 100;

        $after_percentage = round($dish->dish_price * $percentage);

		$order = new Order();
		$order->buyer_user_id = auth()->id();
		$order->buyer_fullname = $request->input('buyer_fullname');
		$order->buyer_contact_n = $request->input('buyer_contact_n');
		$order->buyer_cn_opt = $request->input('buyer_cn_opt');
		$order->dish_id = $dish->id;
		$order->dish_user_id = $dish->profile->id;
		$order->dish_name = $dish->dish_name;

		if($dsp != null) {
            $order->dsp_id = $dsp->id;
            $order->dsp_user_id = $dsp->user->id;
            $order->dsp_service_charge = $dsp->service_charge;
            $order->total_price = $dsp->service_charge + $dish->dish_price + $after_percentage;
            $order->delivery_time = $dsp->max_delivery_time;
        }

		if($pp != null) {
            $order->pp_id = $pp->id;
            $order->pp_user_id = $pp->user->id;
            $order->pp_service_charge = $pp->charge;
            $order->total_price = $pp->charge + $dish->dish_price + $after_percentage;

        }

		$order->dish_price = $dish->dish_price;
		$order->khanidaani_charge = $after_percentage;
		$order->preparation_time = $dish->preparation_time;
		$order->delivery_address = $request->input('delivery_address');
		$order->delivery_address_hint = $request->input('delivery_address_hint');
		$order->payment_type = $request->input('payment_type');

		$order->save();

		$user->notify( new NotifyOrder( $order, 'user'));
		$dish->profile->user->notify(new NotifyOrder( $order, 'chef'));

        if($dsp != null) {
            $dsp->user->notify(new NotifyOrder($order, 'dsp'));
        }

		return redirect()->route( 'order.status', $order);

	}
}

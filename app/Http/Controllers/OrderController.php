<?php

namespace App\Http\Controllers;

use App\DeliveryService;
use App\Dish;
use App\Notifications\NotifyOrder;
use App\Order;
use App\SystemVariables;
use App\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
	public function selectdsp( Dish $dish ) {
		$dsps =   DeliveryService::where('id', $dish->dsp_1)->orWhere('id', $dish->dsp_2)->orWhere('id', $dish->dsp_3)->get();
		return view('order.selectdsp', compact( 'dsps', 'dish'));
	}

	public function confirm(DeliveryService $dsp, Dish $dish) {

//     	return response()->json($dsp);
		return view('order.confirm', compact( 'dsp', 'dish'));
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
		$system = SystemVariables::first();
		$percentage = $system->service_percentage / 100;
		$after_percentage = ($dsp->service_charge + $dish->dish_price) * $percentage;


		$order = new Order();
		$order->buyer_user_id = auth()->id();
		$order->buyer_fullname = $request->input('buyer_fullname');
		$order->buyer_contact_n = $request->input('buyer_contact_n');
		$order->buyer_cn_opt = $request->input('buyer_cn_opt');
		$order->dish_id = $dish->id;
		$order->dsp_id = $dsp->id;
		$order->dsp_service_charge = $dsp->service_charge;
		$order->dish_price = $dish->dish_price;
		$order->khanidaani_charge = $after_percentage;
		$order->total_price = $dsp->service_charge + $dish->dish_price + $after_percentage;
		$order->preparation_time = $dish->preparation_time;
		$order->delivery_address = $request->input('delivery_address');
		$order->delivery_address_hint = $request->input('delivery_address_hint');
		$order->payment_type = $request->input('payment_type');
		$order->delivery_time = $dsp->max_delivery_time;

		$order->save();

		$user->notify( new NotifyOrder( $order, 'user'));
		$dish->profile->user->notify(new NotifyOrder( $order, 'chef'));
		$dsp->user->notify(new NotifyOrder( $order, 'dsp'));

		return redirect()->route( 'order.status', $order);

	}
}

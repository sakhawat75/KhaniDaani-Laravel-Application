<?php

namespace App\Http\Controllers;

use App\DeliveryService;
use App\Dish;
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

    public function status() {
        return view('order.status');
    }
}

<?php

namespace App\Http\Controllers;

use App\DeliveryService;
use App\Dish;
use Illuminate\Http\Request;

class OrderController extends Controller
{
     public function selectdsp( Dish $dish ) {
     	$dsps =   DeliveryService::all();
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

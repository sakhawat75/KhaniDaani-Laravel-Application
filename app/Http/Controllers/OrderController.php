<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
     public function selectdsp() {
    	return view('order.selectdsp');
    }
    
    public function confirm() {
    	return view('order.confirm');
    }
}

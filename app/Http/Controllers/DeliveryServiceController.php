<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeliveryServiceController extends Controller
{
    public function AddService() {
       	return view('delivery.AddService');
       }
}

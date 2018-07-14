<?php

namespace App\Http\Controllers;
use App\DeliveryService;

use Illuminate\Http\Request;
use \App\User;
use Illuminate\Support\Facades\Input;
use Storage;

class DeliveryServiceController extends Controller
{
     public function __construct() {
		$this->middleware('auth')->except('show');
	}

	public function index()
    {
        //
    }

    public function create()
    {
		$deliveryServices = new DeliveryService;
		$deliveryServices = $deliveryServices->get();
	    //return view('deliveryServices.create', compact( 'deliveryServices'));
    }

    public function store(Request $request)
    {
	    
	    //return redirect()->route( 'profile.show', [ 'profile' => $profile ]);
    }

    public function show($id)
    {
	   //
    }
    public function AddService(Request $request) {
    	$deliveryService = new DeliveryService;
    	$id = auth()->id();
		$deliveryService->user_id = $id;
    	//$id = auth()->id();
	    //$user = User::where('user_id', $id)->first(); 	    
	    //$deliveryService->user_id = $user->id;
	    $deliveryService->service_title = $request->input('service_title');
	    $deliveryService->service_description = Input::get('service_description');
	    $deliveryService->service_area = Input::get('service_area');
	    $deliveryService->service_hours = $request->input('service_hours');
	    $deliveryService->service_charge = $request->input('service_charge');
	    $deliveryService->min_delivery_time = $request->input('min_delivery_time');
	    $deliveryService->max_delivery_time = $request->input('max_delivery_time');

	    $deliveryService->save();
	    session()->flash('success', 'Delivery Service has been created successfully');

       	return view('delivery.AddService');
       }
}

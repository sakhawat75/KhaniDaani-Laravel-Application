<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Profile;
use App\User;
use Auth;
use Illuminate\Http\Request;


class ViewController extends Controller
{
    public function index() {
    	if(Auth::check()) {
		    $user = User::find(auth()->id());
		    $user_id = $user->id;
		    $profile = Profile::where('user_id', $user_id)->first();

		    $dishes = Dish::latestDishes( 6);

		    return view('layouts.index', compact( 'profile', 'dishes'));
	    }
    	return view('layouts.index');
    }
}

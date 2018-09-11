<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Profile;
use App\User;
use App\FeaturedDish;
use Auth;
use Illuminate\Http\Request;


class ViewController extends Controller
{
    public function index() {
    	$dishes = Dish::latestDishes( 6);
    	$featured_dishes = FeaturedDish::orderBy('updated_at', 'desc')->with('dish')->limit(5)->get();
    	if(Auth::check()) {
		    $user = User::find(auth()->id());
		    $profile = Profile::where('user_id', $user->id)->first();

		    // $highestRatedDishes = Dish::highestRatedDishes(3);

		    return view('layouts.index', compact( 'profile', 'dishes', 'featured_dishes'));
	    }
    	return view('layouts.index',  compact( 'dishes', 'featured_dishes'));
    }
}

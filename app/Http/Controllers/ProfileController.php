<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Profile;
use Auth;

class ProfileController extends Controller
{
    public function index() {
    	if(!Auth::check()) {
    		return redirect('register');
    	}
    	$user_id = Auth::user()->id;
    	$profile = Profile::where('user_id', $user_id)->first();

    	// return $profile;

    	return view('profile.show', compact('profile'));
    }

    public function profile_setting() {
    	if(!Auth::check()) {
    		return redirect('register');
    	}
    	return view('profile.setting');
    }

    public function create_dish() {
    	return view('dishes.create');
    }

    public function store() {
    	Profile::create([
    		'user_id' => Auth::id(),
    		'fullname' => request('fullname'),
    		'dob' => request('dob'),
    		'mobile_no' => request('mobile_no'),
    		'description' => request('description')
    	]);
    	return redirect('profile');
    }
}

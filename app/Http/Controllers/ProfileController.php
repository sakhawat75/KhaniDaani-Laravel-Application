<?php

namespace App\Http\Controllers;

use App\User;
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
	    $user_id = Auth::user()->id;

	    $profile = Profile::find($user_id);
	    if (request()->filled('fullname')) {
		    $profile->fullname = \request('fullname');
	    }
	    if (request()->filled('dob')) {
		    $profile->dob = \request('dob');
	    }
	    if (request()->filled('mobile_no')) {
		    $profile->mobile_no = \request('mobile_no');
	    }
	    if (request()->filled('description')) {
		    $profile->description = \request('description');
	    }

    	/*Profile::find($user_id)->update([
    		'user_id' => Auth::id(),
    		'fullname' => request('fullname'),
    		'dob' => request('dob'),
    		'mobile_no' => request('mobile_no'),
    		'description' => request('description')
    	]);*/

    	$profile->save();
    	return redirect('profile');
    }
    public function single_dish() {
    	return view('dishes.single-dish');
    }
}

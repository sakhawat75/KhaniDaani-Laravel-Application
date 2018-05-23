<?php

namespace App\Http\Controllers;

use \App\User;
use Illuminate\Http\Request;
use \App\Profile;
use Auth;

class ProfileController extends Controller
{
//	public function __construct() {
//		$this->middleware('auth');
//	}


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
	    $user_id = Auth::user()->id;
	    $profile = Profile::where('user_id', $user_id)->first();

    	return view('profile.setting', compact('profile'));
    }

    public function create_dish() {
    	return view('dishes.create');
    }

    public function store(Request $request) {
	    $user_id = auth()->user()->id;

	    $user = User::find($user_id);
	    $profile = $user->profile()->first();

	    /*$this->validate($request, [
			'profile_photo' => 'image|nullable|mimes:jpeg,png,jpg,gif,svg|max:1999',
		    'cover_photo' => 'image|nullable|mimes:jpeg,png,jpg,gif,svg|max:1999'
	    ]);*/

	    if (request()->filled('fullname')) {
		    $profile->fullname = $request->input('fullname');
	    }
	    if (request()->filled('dob')) {
		    $profile->dob = $request->input('dob');
	    }
	    if (request()->filled('mobile_no')) {
		    $profile->mobile_no = $request->input('mobile_no');
	    }
	    if (request()->filled('description')) {
		    $profile->description = $request->input('description');
	    }

	    /*if($request->hasFile('cover_image')){
		    // Get filename with the extension
		    $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
		    // Get just filename
		    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
		    // Get just ext
		    $extension = $request->file('cover_image')->getClientOriginalExtension();
		    // Filename to store
		    $fileNameToStore= $filename.'_'.time().'.'.$extension;
		    // Upload Image
		    $path = $request->file('cover_image')->storeAs('public/images/cover_images', $fileNameToStore);
		    $profile->cover_photo = $fileNameToStore;
	    }*/

	    $this->upload_image($request, $profile, 'cover_image');
	    $this->upload_image($request, $profile, 'profile_image');

    	/*Profile::find($user_id)->update([
    		'user_id' => Auth::id(),
    		'fullname' => request('fullname'),
    		'dob' => request('dob'),
    		'mobile_no' => request('mobile_no'),
    		'description' => request('description')
    	]);*/

    	$profile->save();
    	return redirect()->route('profile');
    }
    public function single_dish() {
    	if(!Auth::check()) {
    		return redirect('register');
    	}
    	$user_id = Auth::user()->id;
    	$profile = Profile::where('user_id', $user_id)->first();

    	return view('dishes.single-dish', compact('profile'));
    }

    public function upload_image(Request $request, Profile $profile, $type) {
	    if($request->hasFile($type)){
		    // Get filename with the extension
		    $filenameWithExt = $request->file($type)->getClientOriginalName();
		    // Get just filename
		    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
		    // Get just ext
		    $extension = $request->file($type)->getClientOriginalExtension();
		    // Filename to store
		    $fileNameToStore= $filename.'_'.time().'.'.$extension;

		    $destination = 'public/images/' . $type;
		    // Upload Image
		    $path = $request->file($type)->storeAs($destination, $fileNameToStore);
		    $profile->$type = $fileNameToStore;
	    }
    }
}

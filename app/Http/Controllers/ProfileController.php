<?php

namespace App\Http\Controllers;

use \App\User;
use Illuminate\Http\Request;
use \App\Profile;
use Auth;
use Storage;

class ProfileController extends Controller
{
    public function chefdelivery() {
        return view('profile.chefdelivery');
    }

    public function chefdishes() {
        return view('profile.chefdishes');
    }
    
	public function __construct() {
		$this->middleware('auth')->except('show');
	}

	public function create()
	{
		return view('profile.create');
	}

	public function store(Request $request)
	{

	}

	public function show($profile) {

    	$user_id = $profile;
		$user = User::find($user_id);
		$profile = Profile::where('user_id', $user_id)->first();
		if(!$profile) {
			return redirect()->route( 'home');
		}
		$dishes = $profile->dish;

    	return view('profile.show', compact('profile', 'dishes', 'user'));
    }

	public function edit($profile)
	{
		if(!Auth::check()) {
			return redirect('register');
		}
		$user_id = $profile;
		//$user = User::find($user_id);
		$profile = Profile::where('user_id', $user_id)->first();
		if(!$profile) {
			return redirect()->route( 'home');
		}
		if($profile->user_id != auth()->id()) {
			return redirect()->route( 'home');
		}
//	    $user_id = Auth::user()->id;
//	    $profile = Profile::where('user_id', $user_id)->first();

		return view('profile.setting', compact('profile'));
	}

    public function update(Request $request, Profile $profile) {

	    //		$user_id = auth()->user()->id;

		//$user = User::find($user_id);
	    //$profile = $user->profile()->first();

	    /*$this->validate($request, [
			'profile_photo' => 'image|nullable|mimes:jpeg,png,jpg,gif,svg|max:1999',
			'cover_photo' => 'image|nullable|mimes:jpeg,png,jpg,gif,svg|max:1999'
		]);*/

	    $this->validate( $request, [
			'fullname' => 'required|min:2|regex:/^[\pL\s\-\.]+$/u|max:190',
		    'dob' => 'required|date',
		    'mobile_no' => 'required|numeric',
		    'description' => 'required|max:5000',
		    'cover_image' => 'nullable|file|image|max:1024',
		    'profile_image' => 'nullable|file|image|max:1024',
	    ]);

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
	    session()->flash('prf_updated', 'Profile has been updated successfully');
	    return redirect()->route('profile.show', ['profile' => $profile]);
    }

	public function destroy($id)
	{
		//
	}


    public function upload_image(Request $request, Profile $profile, $type) {
	    if($request->hasFile($type)){
		    $this->delete_prev_img($profile, $type);

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

	public function delete_prev_img(Profile $profile, $type) {
		if(strcmp('authcvr.jpg', $profile->$type) == 0) {

		}

		elseif (strcmp('author-avatar.jpg', $profile->$type) == 0){

		}

		else {
			$path = "public/images/".$type."/" . $profile->$type;
			Storage::delete( $path);
		}
	}


}

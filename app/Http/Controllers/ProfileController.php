<?php

namespace App\Http\Controllers;

use App\City;
use App\DeliveryService;
use App\PickersPoint;
use \App\User;
use Illuminate\Http\Request;
use \App\Profile;
use Auth;
use Intervention\Image\Facades\Image;
use Storage;

class ProfileController extends Controller
{
    public function cashout() {
        return view('profile.cashout');
    }

    public function add_balance() {
        return view('profile.add_balance');
    }

    public function pickerspoint($profile) {

        $user = User::find($profile);
        $profile = Profile::where('user_id', $profile)->first();
        if(!$profile) {
            return redirect()->route( 'home');
        }
        $dishes = $profile->dish;

        $total_sales = 0;
        $total_ratings = round($user->ratings->avg('rating'));
        $total_ratings_count = count($user->ratings);

        foreach ($dishes as $dish) {
            $total_sales += count($dish->completed_orders);
        }

        $pickerspoints = PickersPoint::where('user_id', $user->id)->paginate(4);

        return view('profile.pickerspoint', compact('profile', 'dishes', 'user', 'total_sales', 'total_ratings', 'total_ratings_count', 'pickerspoints'));
    }

    
    public function chefdelivery($profile) {

    	$user = User::find($profile);
    	
    	$dsps = $user->delivery_services;

		$profile = Profile::where('user_id', $profile)->first();
		if(!$profile) {
			return redirect()->route( 'home');
		}
		$dishes = $profile->dish;

		$total_sales = 0;
		$total_ratings = round($user->ratings->avg('rating'));
		$total_ratings_count = count($user->ratings);

		foreach ($dishes as $dish) {
		 	$total_sales += count($dish->completed_orders);
		 }


    	//return response()->json($dsps) ;
        return view('profile.chefdelivery', compact( 'dsps', 'profile', 'dishes', 'user', 'total_sales', 'total_ratings', 'total_ratings_count'));
    }

    public function chefdishes($profile) {

        $user = User::find($profile);
        $profile = Profile::where('user_id', $profile)->first();
        if(!$profile) {
            return redirect()->route( 'home');
        }
        $dishes = $profile->dish()->paginate(8);

        $total_sales = 0;
        $total_ratings = round($user->ratings->avg('rating'));
        $total_ratings_count = count($user->ratings);

        foreach ($dishes as $dish) {
            $total_sales += count($dish->completed_orders);
        }

        return view('profile.chefdishes', compact('profile', 'dishes', 'user', 'total_sales', 'total_ratings', 'total_ratings_count'));
    }
    
	public function __construct() {
		$this->middleware('auth')->except('show');
	}

	public function create()
	{
		$cities = new City;
		$cities = $cities->get();
	    return view('profile.create', compact( 'cities'));
		//return view('profile.create');
	}

	public function store(Request $request)
	{

	}

	public function show($profile) {

		$user = User::find($profile);
		$profile = Profile::where('user_id', $profile)->first();
		if(!$profile) {
			return redirect()->route( 'home');
		}
		$dishes = $profile->dish;

		$total_sales = 0;
		$total_ratings = round($user->ratings->avg('rating'));
		$total_ratings_count = count($user->ratings);

		foreach ($dishes as $dish) {
		 	$total_sales += count($dish->completed_orders);
		 }

		 // echo $profile->id;

    	return view('profile.show', compact('profile', 'dishes', 'user', 'total_sales', 'total_ratings', 'total_ratings_count'));
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

        $cities = City::all();

		return view('profile.setting', compact('profile', 'cities'));
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
		    'mobile_no' => 'required|max:15|min:11|string',
		    'description' => 'max:2000|min:10',
		    'cover_image' => 'nullable|file|image|mimes:jpeg,png,jpg,gif,svg,bmp|max:5120',
		    'profile_image' => 'nullable|file|image|mimes:jpeg,png,jpg,gif,svg,bmp|max:5120',
		    'city' => 'required',
		    'areas' => 'required',
            'address' => 'required|max:500|min:4',
            'address_hint' => 'max:100|min:4',
	    ]);

        if (request()->filled('city')) {
            $profile->city = $request->input('city');
        }
        if (request()->filled('areas')) {
            $profile->area = $request->input('areas');
        }

        if (request()->filled('address')) {
            $profile->address = $request->input('address');
        }
        if (request()->filled('address_hint')) {
            $profile->address_hint = $request->input('address_hint');
        }

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
	    $request->session()->flash();
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
            $filename = preg_replace('/\s+/', '', $filename);

		    // Get just ext
		    $extension = $request->file($type)->getClientOriginalExtension();

		    // Filename to store
		    $fileNameToStore= $profile->user->name . '_' . $filename. '_' . time() . '.' .$extension;

		    $destination = 'public/images/' . $type;

            $path = $destination . '/' . $fileNameToStore;

            // Upload Image
            if($type == 'profile_image') {
                $image = Image::make($request->file($type))->fit(100, 100, function ($constraint) {
                    $constraint->upsize();
                });
//                $path = $image->storeAs($destination, $fileNameToStore);
                Storage::put($path, (string) $image->encode());

            } elseif ($type == 'cover_image') {
                $image = Image::make($request->file($type))->fit(730, 411, function ($constraint) {
                    $constraint->upsize();
                });

//                $path = $image->storeAs($destination, $fileNameToStore);
                Storage::put($path, (string) $image->encode());

            }

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
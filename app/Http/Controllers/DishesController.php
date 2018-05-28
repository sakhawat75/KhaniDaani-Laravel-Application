<?php

namespace App\Http\Controllers;

use App\Dish;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Storage;


class DishesController extends Controller
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
	    return view('dishes.create');
    }


    public function store(Request $request)
    {
	    $id = auth()->id();
	    $user = User::find($id);
	    $profile = $user->profile;

	    $dish = new Dish;
	    $dish->profile_id = $profile->id;
	    $dish->dish_category = Input::get('dish_category');
	    $dish->dish_subcategory = Input::get('dish_subcategory');
	    $dish->preparation_time = Input::get('preparation_time');
	    $dish->dish_name = $request->input('dish_name');
	    $dish->dish_price = $request->input('dish_price');
	    $dish->dish_description = $request->input('dish_description');
	    $dish->item_tags = $request->input('item_tags');

	    $this->upload_image( $request, $dish, 'dish_images', 'dish_thumbnail');
	    $this->upload_image( $request, $dish, 'dish_images', 'dish_image_1');
	    $this->upload_image( $request, $dish, 'dish_images', 'dish_image_2');
	    $this->upload_image( $request, $dish, 'dish_images', 'dish_image_3');

	    $dish->save();

	    return redirect()->route( 'profile.show', [ 'profile' => $profile ]);
    }

    public function show($id)
    {
	    $dish = Dish::find($id);
	    $profile = $dish->profile;

        return view('dishes.single-dish', compact( 'profile', 'dish'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function manage() {
    	return view('dishes.manage-dish');
    }

	public function upload_image(Request $request, Dish $dish, $type, $input_name) {
		if($request->hasFile($input_name)){

			// Get filename with the extension
			$filenameWithExt = $request->file($input_name)->getClientOriginalName();
			// Get just filename
			$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
			// Get just ext
			$extension = $request->file($input_name)->getClientOriginalExtension();
			// Filename to store
			$fileNameToStore= $filename.'_'.time().'.'.$extension;

			$destination = 'public/images/' . $type;
			// Upload Image
			$path = $request->file($input_name)->storeAs($destination, $fileNameToStore);
			$dish->$input_name = $fileNameToStore;
		}
	}

	public function delete_prev_img(Dish $dish, $type, $input_name) {
		if(strcmp('dishid_img1.jpg', $dish->$input_name) == 0) {

		}

		elseif (strcmp('author-avatar.jpg', $dish->$input_name) == 0){

		}

		else {
			$path = "public/images/".$type."/" . $dish->$input_name;
			Storage::delete( $path);
		}
	}
}

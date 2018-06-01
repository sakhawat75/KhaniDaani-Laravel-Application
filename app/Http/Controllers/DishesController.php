<?php

namespace App\Http\Controllers;

use App\Category;
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
		$categories = new Category;
		$categories = $categories->get();
	    return view('dishes.create', compact( 'categories'));
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

	    $this->upload_image( $request, $dish, 'dish_images', 'dish_thumbnail', false);
	    $this->upload_image( $request, $dish, 'dish_images', 'dish_image_1', false);
	    $this->upload_image( $request, $dish, 'dish_images', 'dish_image_2', false);
	    $this->upload_image( $request, $dish, 'dish_images', 'dish_image_3', false);

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
    	$dish = Dish::find($id);
	    return view('dishes.dish-edit', compact( 'dish'));
    }

    public function update(Request $request, $id)
    {
        $dish = Dish::find($id);
	    $profile = $dish->profile;

	    if (request()->filled('dish_category')) {
		    $dish->dish_category = $request->input('dish_category');
	    }
	    if (request()->filled('dish_subcategory')) {
		    $dish->dish_subcategory = $request->input('dish_subcategory');
	    }
	    if (request()->filled('preparation_time')) {
		    $dish->preparation_time = $request->input('preparation_time');
	    }
	    if (request()->filled('dish_name')) {
		    $dish->dish_name = $request->input('dish_name');
	    }
    	if (request()->filled('dish_price')) {
		    $dish->dish_price = $request->input('dish_price');
	    }
    	if (request()->filled('dish_description')) {
		    $dish->dish_description = $request->input('dish_description');
	    }
	    if (request()->filled('item_tags')) {
		    $dish->item_tags = $request->input('item_tags');
	    }

	    $this->upload_image( $request, $dish, 'dish_images', 'dish_thumbnail', true);
	    $this->upload_image( $request, $dish, 'dish_images', 'dish_image_1', true);
	    $this->upload_image( $request, $dish, 'dish_images', 'dish_image_2', true);
	    $this->upload_image( $request, $dish, 'dish_images', 'dish_image_3', true);

	    $dish->update();

	    return view('dishes.single-dish', compact( 'profile', 'dish'));

    }

    public function destroy($id)
    {
	    $dish = Dish::find($id);

	    $this->delete_prev_img( $dish, 'dish_images', 'dish_thumbnail');
	    $this->delete_prev_img( $dish, 'dish_images', 'dish_image_1');
	    $this->delete_prev_img( $dish, 'dish_images', 'dish_image_2');
	    $this->delete_prev_img( $dish, 'dish_images', 'dish_image_3');

	    $dish->delete();

	    return redirect()->action( 'DishesController@manage');
    }

    public function manage() {
		$id = auth()->id();
	    $profile = Profile::where('user_id', $id)->first();
	    $dishes = $profile->dish;

	    if(!$dishes->first()) {
	    	return redirect()->route( 'dishes.create');
	    }
    	return view('dishes.manage-dish', compact( 'profile', 'dishes'));
    }

    public function editdish() {
    	return view('dishes.dish-edit');
    }

	public function upload_image(Request $request, Dish $dish, $type, $input_name, $del_prev) {
		if($request->hasFile($input_name)){

			if($del_prev) {
				$this->delete_prev_img( $dish, $type, $input_name);
			}
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

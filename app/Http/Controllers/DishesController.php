<?php

namespace App\Http\Controllers;

use App\Category;
use App\Dish;

use App\Profile;
use App\User;
use App\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Storage;


class DishesController extends Controller
{

    public function purchase() {
        return view('dishes.purchase');
    }

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

        $validatedData = $request->validate([
            'dish_category' => 'required|string|max:50',
            'dish_subcategory' => 'required|string|max:50',
            'preparation_time' => 'required|integer|min:1|max:4',
            'dish_name' => 'required|string|max:50|min:3',
            'dish_price' => 'required|integer|min:10|max:9999',
            'dish_description' => 'required|max:1000|string|min:20',
            'dsp_1' => 'nullable|integer|min:1',
            'dsp_2' => 'nullable|integer|min:1',
            'dsp_3' => 'nullable|integer|min:1',
            'pp1' => 'nullable|integer|min:1',
            'pp2' => 'nullable|integer|min:1',
            'pp3' => 'nullable|integer|min:1',
            'dish_thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
            'dish_image_1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
            'dish_image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
            'dish_image_3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
            'avg_rating' => 'nullable',
            'is_approved' => 'nullable|boolean',

        ]);

        if(!$request->input('dsp_1') && !$request->input('dsp_2')
            && !$request->input('dsp_3') && !$request->input('pp1')
            && !$request->input('pp2') && !$request->input('pp3')
        ) {
            return redirect()->back()->withErrors(['Error', 'Please Input at least one dsp or pickerspoint id']);
        } /*else {
            return redirect()->back()->with('success', 'You have Inputed at least one dsp or pickerspoint id');
        }*/

	    $id = auth()->id();
	    $profile = Profile::where('user_id', $id)->first();

	    $dish = new Dish;
	    $dish->profile_id = $profile->id;
	    $dish->dish_category = Input::get('dish_category');
	    $dish->dish_subcategory = Input::get('dish_subcategory');
	    $dish->preparation_time = Input::get('preparation_time');
	    $dish->dish_name = $request->input('dish_name');
	    $dish->dish_price = $request->input('dish_price');
	    $dish->dish_description = $request->input('dish_description');
//	    $dish->item_tags = $request->input('item_tags');
	    $dish->dsp_1 = $request->input('dsp_1');
	    $dish->dsp_2 = $request->input('dsp_2');
	    $dish->dsp_3 = $request->input('dsp_3');
	    $dish->pp1 = $request->input('pp1');
	    $dish->pp2 = $request->input('pp2');
	    $dish->pp3 = $request->input('pp3');

	    $this->upload_image( $request, $dish, 'dish_images', 'dish_thumbnail', false);
	    $this->upload_image( $request, $dish, 'dish_images', 'dish_image_1', false);
	    $this->upload_image( $request, $dish, 'dish_images', 'dish_image_2', false);
	    $this->upload_image( $request, $dish, 'dish_images', 'dish_image_3', false);

	    $dish->save();
//	    session()->flash('success', 'Dish has been created successfully');

	    return redirect()->route( 'profile.show', [ 'profile' => $profile ])->with('success', 'Dish has been created successfully');
    }

    public function show($id)
    {
	    $dish = Dish::find($id);
	    $profile = $dish->profile;

	    $ratings = Rating::where('chef_id', $profile->id)->where('dish_id', $dish->id)->get();

	    $avg_rating = 0;
	    $rating_sum = 0;
	    $i = 0;

	    foreach ($ratings as $rating) {
	    	$rating_sum += $rating->rating;
	    	$i++;
	    }

	    if($i != 0) {
			$avg_rating = $rating_sum / $i;
	    }
	    
	    // echo "avg_Rating: " . $avg_rating . "<br>";

	    $half_star = false;

    	$rounded_avg_rating = round($avg_rating);
    	if(abs($rounded_avg_rating - $avg_rating) >= .25 ) {
    		$half_star = true;
    	}

    	if($half_star) {
    		if(($avg_rating - $rounded_avg_rating) < 0) {
    			$avg_rating = $rounded_avg_rating - 1;
    		} else {
    			$avg_rating = $rounded_avg_rating;
    		}
    		
    	} else {
    		$avg_rating = $rounded_avg_rating;
    	}
	   

	    /*echo "avg_Rating: " . $avg_rating . "<br>";
	    echo "rounded_avg_rating: " . $rounded_avg_rating . "<br>";
	    echo "half_star: " . $half_star . "<br>";*/
	    

        return view('dishes.single-dish', compact( 'profile', 'dish', 'ratings', 'avg_rating', 'half_star'));
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
	    session()->flash('success', 'Dish has been updated successfully');

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
	    	session()->flash( 'success', 'No Dish To manage. Please Create a dish First');
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

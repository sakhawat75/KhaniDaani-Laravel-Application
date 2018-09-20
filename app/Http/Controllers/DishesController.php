<?php

namespace App\Http\Controllers;

use App\Category;
use App\DeliveryService;
use App\Dish;

use App\PickersPoint;
use App\Profile;
use App\User;
use App\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
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
        $user = auth()->user();
        if(!$user->profile->address || !$user->profile->mobile_no || !$user->profile->city) {
            return redirect()->route('profile.edit', ['profile' => $user->profile->id])->withErrors('You Must Fill Up The Profile Information To Create a New Dish');
        }

		$categories = new Category;
		$categories = $categories->get();
        $dsp_ids = DeliveryService::select('id', 'service_title')
            ->whereHas('profile', function ($query) {
                $query->where('city', '=', auth()->user()->profile->city);
            })
            ->get();
        $pp_ids = PickersPoint::select('id', 'name')
            ->whereHas('profile', function ($query) {
                $query->where('city', '=', auth()->user()->profile->city);
            })
            ->get();

//        return $dsp_ids;

	    return view('dishes.create', compact( 'categories', 'dsp_ids', 'pp_ids'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        if(!$user->profile->address || !$user->profile->mobile_no || !$user->profile->city) {
            return redirect()->route('profile.edit', ['profile' => $user->profile->id])->withErrors('You Must Fill Up The Profile Information To Create a New Dish');
        }

        $validatedData = $request->validate([
            'dish_category' => 'required|string|max:50',
            'dish_subcategory' => 'required|string|max:50',
            'preparation_time' => 'required|integer|min:1|max:4',
            'dish_name' => 'required|string|max:50|min:3',
            'dish_price' => 'required|integer|min:10|max:9999',
            'dish_description' => 'required|max:5000|string|min:2',
            'dsp_1' => 'nullable|integer|min:1',
            'dsp_2' => 'nullable|integer|min:1',
            'dsp_3' => 'nullable|integer|min:1',
            'pp1' => 'nullable|integer|min:1',
            'pp2' => 'nullable|integer|min:1',
            'pp3' => 'nullable|integer|min:1',
            'dish_thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg,bmp|max:5120',
            'dish_image_1' => 'required|image|mimes:jpeg,png,jpg,gif,svg,bmp|max:5120',
            'dish_image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,bmp|max:5120',
            'dish_image_3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,bmp|max:5120',
            'avg_rating' => 'nullable',
            'is_approved' => 'nullable|boolean',

        ]);

        if(!$request->input('dsp_1') && !$request->input('dsp_2')
            && !$request->input('dsp_3') && !$request->input('pp1')
            && !$request->input('pp2') && !$request->input('pp3')
        ) {
            return redirect()->back()->withInput()->withErrors(['Error', 'Please Input at least one dsp or pickerspoint id']);
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
//        $request->session()->flash();

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
    	if($dish->profile_id != auth()->user()->profile->id) {
    	    return redirect()->back()->withErrors('You are not authorized to edit this dish');
        }
        $categories = new Category;
        $categories = $categories->get();
        $dsp_ids = DeliveryService::select('id', 'service_title')
            ->whereHas('profile', function ($query) {
                $query->where('city', '=', auth()->user()->profile->city);
            })
            ->get();
        $pp_ids = PickersPoint::select('id', 'name')
            ->whereHas('profile', function ($query) {
                $query->where('city', '=', auth()->user()->profile->city);
            })
            ->get();

//        return $dsp_ids;

	    return view('dishes.dish-edit', compact( 'dish', 'categories', 'dsp_ids', 'pp_ids'));
    }

    public function update(Request $request, $id)
    {
        ini_set('max_execution_time', 300);
        ini_set('memory_limit','2048M');

        $validatedData = $request->validate([
            'dish_category' => 'string|max:50',
            'dish_subcategory' => 'string|max:50',
            'preparation_time' => 'integer|min:1|max:4',
            'dish_name' => 'string|max:50|min:3',
            'dish_price' => 'integer|min:10|max:9999',
            'dish_description' => 'max:5000|string|min:2',
            'dsp_1' => 'nullable|integer|min:1',
            'dsp_2' => 'nullable|integer|min:1',
            'dsp_3' => 'nullable|integer|min:1',
            'pp1' => 'nullable|integer|min:1',
            'pp2' => 'nullable|integer|min:1',
            'pp3' => 'nullable|integer|min:1',
            /*'dish_thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,bmp|max:5120',
            'dish_image_1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,bmp|max:5120',
            'dish_image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,bmp|max:5120',
            'dish_image_3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,bmp|max:5120',*/
            'avg_rating' => 'nullable',
            'is_approved' => 'nullable|boolean',

        ]);

        $dish = Dish::find($id);
	    $profile = $dish->profile;

        if($dish->profile_id != auth()->user()->profile->id) {
            return redirect()->back()->withErrors('You are not authorized to edit this dish');
        }

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

        if (request()->filled('dsp_1')) {
            $dish->dsp_1 = $request->input('dsp_1');
        }

        if (request()->filled('dsp_2')) {
            $dish->dsp_2 = $request->input('dsp_2');
        }

        if (request()->filled('dsp_3')) {
            $dish->dsp_3 = $request->input('dsp_3');
        }

	    if (request()->filled('pp1')) {
            $dish->pp1 = $request->input('pp1');
        }

	    if (request()->filled('pp2')) {
            $dish->pp2 = $request->input('pp2');
        }

	    if (request()->filled('pp3')) {
            $dish->pp3 = $request->input('pp3');
        }

	    if($request->hasFile('dish_thumbnail')) {
            $this->upload_image( $request, $dish, 'dish_images', 'dish_thumbnail', true);
        }

        if($request->hasFile('dish_image_1')) {
            $this->upload_image( $request, $dish, 'dish_images', 'dish_image_1', true);
        }

        if($request->hasFile('dish_image_2')) {
            $this->upload_image( $request, $dish, 'dish_images', 'dish_image_2', true);
        }

	    if($request->hasFile('dish_image_3')) {
            $this->upload_image( $request, $dish, 'dish_images', 'dish_image_3', true);
        }

	    /*$this->upload_image( $request, $dish, 'dish_images', 'dish_image_1', true);
	    $this->upload_image( $request, $dish, 'dish_images', 'dish_image_2', true);
	    $this->upload_image( $request, $dish, 'dish_images', 'dish_image_3', true);*/

	    $dish->update();
//	    session()->flash('success', 'Dish has been updated successfully');

	    return redirect()->route('dishes.show', ['id' => $dish->id])->with('success', 'Dish has been updated successfully');

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
	    $dishes = $profile->dish()->paginate(9);

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
            $filename = preg_replace('/\s+/', '', $filename);

            // Get just ext
			$extension = $request->file($input_name)->getClientOriginalExtension();
			// Filename to store
            for ($i=0; $i<100; $i++) {

            }

            $fileNameToStore= $dish->profile->user->name . '_' . time() . '.' .$extension;
//            $fileNameToStore= $dish->profile->user->name . '_' . $filename . '_' . time() . '.' .$extension;

            $destination = 'public/images/' . $type;
			// Upload Image
            $path = $destination . '/' . $fileNameToStore;
//			$path = $request->file($input_name)->storeAs($destination, $fileNameToStore);

            try {
                $image = Image::make($request->file($input_name))->fit(730, 411);
            } catch (\Exception $e) {
                return redirect()->back()->withErrors('Memory Limit Crossed . Image Uploading failed');
            }

            /*$image = Image::make($request->file($input_name))->fit(730, 411, function ($constraint) {
                $constraint->upsize();
            });

            */
            Storage::put($path, (string) $image->encode());

            $dish->$input_name = $fileNameToStore;
		}
	}

	public function delete_prev_img(Dish $dish, $type, $input_name) {
		if(strcmp('img1.jpg', $dish->$input_name) == 0) {
            return;
		}

		if (strcmp('img2.jpg', $dish->$input_name) == 0){
            return;
		}

        if (strcmp('img3.jpg', $dish->$input_name) == 0){
            return;
        }

        if (strcmp('t1.jpg', $dish->$input_name) == 0){
            return;
        }

		if (strcmp('t2.jpg', $dish->$input_name) == 0){
            return;
        }

		if (strcmp('t3.jpg', $dish->$input_name) == 0){
            return;
        }

			$path = "public/images/".$type."/" . $dish->$input_name;
			Storage::delete( $path);

	}
}

<?php

namespace App\Http\Controllers;

use App\Area;
use App\Category;
use App\City;
use App\Dish;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class RestApiController extends Controller
{

	public function jsonCategories()
	{
		$categories = Category::all();
		return response()->json($categories);
	}

    public function jsonSubCat() {
    	$cat_name = Input::get('cat_name');
    	$cat_id = Category::where('name', '=', $cat_name)->first();
    	$id = $cat_id->id;
    	$subcategories = SubCategory::where('category_id', '=', $id)->get();

    	return \Response::json($subcategories);
    }


    public function jsonAreas() {
        $city_name = Input::get('city_name');
        $city_id = City::where('name', '=', $city_name)->first();
        $id = $city_id->id;
        $areas = Area::where('city_id', '=', $id)->get();

        return \Response::json($areas);
    }

    public function jsonSearchDish(Request $request) {
		if ($request->has( 'dish_category')) {
			$dish_category = $request->input('dish_category');
			$dishes = Dish::where('dish_category', $dish_category)->with('profile');
		}
		if ($request->has( 'dish_subcategory')) {
			$dish_subcategory = $request->input('dish_subcategory');
			$dishes = $dishes->Where('dish_subcategory', $dish_subcategory);
		}

		$dishes = $dishes->get();

		return response()->json($dishes);
    }
}

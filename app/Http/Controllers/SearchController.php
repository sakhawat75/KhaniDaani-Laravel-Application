<?php

namespace App\Http\Controllers;

use App\Category;
use App\City;
use App\Dish;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function livedish() {
        $dishes = Dish::paginate(8);
        $categories = Category::all();
        $cities = City::all();

        return view('search.livedish', compact('dishes', 'categories', 'cities'));
    }

    public function search_livedish(Request $request)
    {
        $dish_category = $request->input('dish_category');
        $dish_subcategory = $request->input('dish_subcategory');

        $dishes = Dish::where('dish_subcategory', $dish_subcategory)->paginate(8);
        $categories = Category::all();
        $cities = City::all();

        return view('search.livedish', compact('dishes', 'categories', 'cities'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Category;
use App\Dish;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function livedish() {
        $dishes = Dish::paginate(9);
        $categories = Category::all();
        return view('search.livedish', compact('dishes', 'categories'));
    }

    public function search_livedish(Request $request)
    {
        $dish_category = $request->input('dish_category');
        $dish_subcategory = $request->input('dish_subcategory');

        $dishes = Dish::where('dish_subcategory', $dish_subcategory)->paginate(9);
        $categories = Category::all();
        return view('search.livedish', compact('dishes', 'categories'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Dish;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class DishesController extends Controller
{

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
	    $dish->item_tags = $request->input('item_tags');
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
}

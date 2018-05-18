<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index() {
    	return view('profile.show');
    }

    public function profile_setting() {
    	return view('profile.setting');
    }

    public function create_dish() {
    	return view('dishes.create');
    }
}

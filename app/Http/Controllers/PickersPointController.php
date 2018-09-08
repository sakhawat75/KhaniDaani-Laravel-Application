<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PickersPointController extends Controller

{
    public function pickerspoint() {
           return view('pickerspoint.addpp');
       }
}

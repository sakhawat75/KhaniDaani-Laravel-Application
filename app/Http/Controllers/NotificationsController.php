<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class notificationsController extends Controller
{
    public function notifications() {
        return view('notifications.all');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class notificationsController extends Controller
{
    public function notifications() {
        return view('notifications.all');
    }

    public function messages() {
        return view('messages.all');
    }

    public function compose() {
        return view('messages.compose');
    }
}
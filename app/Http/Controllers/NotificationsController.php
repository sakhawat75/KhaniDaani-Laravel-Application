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

    public function mark_as_read(Request $request) {

    	if($request->has('notification')) {
    		$notification_id = $request->input('notification');
    	}
    	
    	$user = auth()->user();
        $notification = $user->notifications()->where('id',$notification_id)->first();
        $notification->markAsRead();

        // return response()->json('Notification Marked as read successfully' . $notification);
    }
}
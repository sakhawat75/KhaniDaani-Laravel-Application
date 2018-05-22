<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['user_id', 'fullname', 'dob', 'mobile_no', 'description'];

    public static function store($id) {
    	$profile = \App\Profile::create([
    		'user_id' => $id
	    ]);
    }

    public function user() {
    	return $this->belongsTo('App\User');
    }
}

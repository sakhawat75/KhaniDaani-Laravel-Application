<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;


class Profile extends Model
{
    protected $fillable = ['user_id', 'fullname', 'dob', 'mobile_no', 'description', 'city', 'area', 'address', 'address_hint'];

    public static function store($id, $name) {
//    	$profile = \App\Profile::create([
//    		'user_id' => $id,
//    		'user_name' => auth()->user()
//	    ]);
    	$profile = new Profile();
    	$profile->user_id = $id;
    	$profile->user_name = $name;
    	$profile->save();
    }

    public function user() {
    	return $this->belongsTo('App\User');
    }

    public function dish() {
    	return $this->hasMany(Dish::class);
    }
}

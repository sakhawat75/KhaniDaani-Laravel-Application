<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_fullname', 'user_mobile_no', 'user_dob', 'user_cover_photo', 'user_description', 'user_avgRating', 'user_communicationRating', 'user_presetationRating', 'user_timingRating', 'user_describeRating'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile() {
    	return $this->hasOne('App\Profile');
    }

     public function delivery_services() {
        return $this->hasMany( DeliveryService::class);
    }
}

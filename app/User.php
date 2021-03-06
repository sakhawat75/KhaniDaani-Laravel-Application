<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\DeliveryService[] $delivery_services
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notificationsController
 * @property-read \App\Profile $profile
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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

    public function orders ()
    {
        return $this->hasMany( Order::class );
    }

    public function ratings ()
    {
        return $this->hasMany( Rating::class, 'chef_id', 'id' );
    }

    public function sentMessages ()
    {
        return $this->hasMany( Message::class, 'sender_id', 'id' );
    }

    public function receivedMessages ()
    {
        return $this->hasMany( Message::class, 'recipient_id', 'id' );
    }

    public function pickerspoints()
    {
        return $this->hasMany(PickersPoint::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function isChef() {
        $dishes = $this->profile->dish;
        if(count($dishes) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function isDsp() {
        $dsps = $this->delivery_services;
        if(count($dsps) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function isPP() {
        $pps = $this->pickerspoints;
        if(count($pps) > 0) {
            return true;
        } else {
            return false;
        }
    }
}

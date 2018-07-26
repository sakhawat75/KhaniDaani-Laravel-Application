<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Profile
 *
 * @property int $id
 * @property int $user_id
 * @property string $user_name
 * @property string $fullname
 * @property string $mobile_no
 * @property string $dob
 * @property string $city
 * @property string $area
 * @property string|null $address
 * @property string|null $address_hint
 * @property string $cover_image
 * @property string $profile_image
 * @property string $description
 * @property float $avgRating
 * @property float $communicationRating
 * @property float $presentationRating
 * @property float $timingRating
 * @property float $describeRating
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Dish[] $dish
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereAddressHint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereAvgRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereCommunicationRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereCoverImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereDescribeRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereFullname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereMobileNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile wherePresentationRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereProfileImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereTimingRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereUserName($value)
 * @mixin \Eloquent
 */
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

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user() {
    	return $this->belongsTo('App\User');
    }

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function dish() {
    	return $this->hasMany(Dish::class);
    }
}

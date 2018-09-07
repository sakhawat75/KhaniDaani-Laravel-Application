<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Dish
 *
 * @property int $id
 * @property int $profile_id
 * @property int|null $dsp_1
 * @property int|null $dsp_2
 * @property int|null $dsp_3
 * @property string $dish_category
 * @property string $dish_subcategory
 * @property string $dish_name
 * @property string $dish_description
 * @property float $dish_price
 * @property string $preparation_time
 * @property string $dish_thumbnail
 * @property string $dish_image_1
 * @property string $dish_image_2
 * @property string $dish_image_3
 * @property int $is_approved
 * @property string $item_tags
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Profile $profile
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dish whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dish whereDishCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dish whereDishDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dish whereDishImage1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dish whereDishImage2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dish whereDishImage3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dish whereDishName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dish whereDishPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dish whereDishSubcategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dish whereDishThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dish whereDsp1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dish whereDsp2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dish whereDsp3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dish whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dish whereIsApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dish whereItemTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dish wherePreparationTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dish whereProfileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dish whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dish whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Dish extends Model
{
	protected $table = "dishes";

    public function profile() {
    	return $this->belongsTo( 'App\Profile')->withDefault();
    }

    public static function latestDishes($limit) {
    	return static::latest()->limit($limit)->get();
    }

    public function orders() {
    	return $this->hasMany(Order::class, 'dish_id', 'id');
    }

    public function completed_orders() {
    	return $this->hasMany(Order::class, 'dish_id', 'id')->where('is_order_completed', 1);
    }

    public function ratings() {
    	return $this->hasMany(Rating::class, 'dish_id', 'id');
    }

}

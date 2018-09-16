<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\DeliveryService
 *
 * @property array|null|string min_delivery_time
 * @property array|null|string max_delivery_time
 * @property int $id
 * @property int $user_id
 * @property string $service_title
 * @property string $service_description
 * @property string $service_area
 * @property string $service_hours_start
 * @property string $service_hours_end
 * @property float $service_charge
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DeliveryService whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DeliveryService whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DeliveryService whereMaxDeliveryTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DeliveryService whereMinDeliveryTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DeliveryService whereServiceArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DeliveryService whereServiceCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DeliveryService whereServiceDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DeliveryService whereServiceHoursEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DeliveryService whereServiceHoursStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DeliveryService whereServiceTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DeliveryService whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DeliveryService whereUserId($value)
 * @mixin \Eloquent
 */
class DeliveryService extends Model
{
    protected $table = "delivery_services";
    protected $fillable = ['service_title', 'service_description', 'service_area', 'service_charge', 'min_delivery_time', 'max_delivery_time', 'service_hours_start', 'service_hours_end'];

    public function user() {
	 	return $this->belongsTo( User::class, 'user_id');
	}

	public function profile() {
	 	return $this->belongsTo( Profile::class, 'user_id', 'user_id');
	}

	/*public function scopeProfile($query) {

	}*/
}

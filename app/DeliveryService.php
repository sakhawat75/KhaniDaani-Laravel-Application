<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property array|null|string min_delivery_time
 * @property array|null|string max_delivery_time
 */
class DeliveryService extends Model
{
    protected $table = "delivery_services";
    protected $fillable = ['service_title', 'service_description', 'service_area', 'service_charge', 'min_delivery_time', 'max_delivery_time', 'service_hours_start', 'service_hours_end'];

    public function user() {
	 	return $this->belongsTo( User::class);
	}
}

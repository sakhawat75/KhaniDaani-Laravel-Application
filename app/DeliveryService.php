<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryService extends Model
{
    protected $table = "delivery_services";
    protected $fillable = ['service_title', 'service_description', 'service_area', 'service_charge', 'min_delivery_time', 'max_delivery_time'];

    public function user() {
	 	return $this->belongsTo( User::class);
	}
}

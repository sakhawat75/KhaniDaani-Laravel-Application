<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'areas';
	protected $fillable = ['name', 'city_id'];

	public function city() {
	 	return $this->belongsTo( City::class);
	}
}

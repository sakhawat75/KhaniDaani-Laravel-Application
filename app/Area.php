<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Area
 *
 * @property int $id
 * @property string $name
 * @property int $city_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\City $city
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Area whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Area whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Area whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Area whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Area whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Area extends Model
{
    protected $table = 'areas';
	protected $fillable = ['name', 'city_id'];

	public function city() {
	 	return $this->belongsTo( City::class);
	}
}

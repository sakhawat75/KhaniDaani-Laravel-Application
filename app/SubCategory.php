<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\SubCategory
 *
 * @property int $id
 * @property string $name
 * @property int $category_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Category $category
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubCategory whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SubCategory extends Model
{
	protected $table = 'subcategories';
	protected $fillable = ['name', 'category_id'];

	public function category() {
	 	return $this->belongsTo( Category::class);
	}
}

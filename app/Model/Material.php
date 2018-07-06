<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
	protected $fillable = [
		'recipe_id',
		'main_material',
		'material',
	];

    public function recipe()
	{
	  return $this->belongsTo(Recipe::class);
	}
}

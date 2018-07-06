<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Making extends Model
{
	protected $fillable = [
		'recipe_id',
		'make',
	];

    public function recipe()
    {
    	return $this->belongsTo(Recipe::class);
    }
}

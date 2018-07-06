<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
	protected $fillable = [
		'like',
		'recipe_id',
		'who',
	];

    public function recipe()
    {
    	return $this->belongsTo(Recipe::class);
    }
}

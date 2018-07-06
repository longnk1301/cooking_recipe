<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Purpose extends Model
{
	protected $fillable = [
		'purpose',
	];

    public function recipes()
	{
	  return $this->belongsToMany(Recipe::class);
	}
}

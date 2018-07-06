<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Occasion extends Model
{
    public function recipes()
	{
	  return $this->belongsToMany(Recipe::class);
	}
}

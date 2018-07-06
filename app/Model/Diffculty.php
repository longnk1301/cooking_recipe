<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Diffculty extends Model
{
    public function recipes()
	{
	  return $this->hasMany(Recipe::class);
	}
}

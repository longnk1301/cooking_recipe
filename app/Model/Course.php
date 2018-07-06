<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function recipes()
	{
	  return $this->belongsToMany(Recipe::class);
	}
}

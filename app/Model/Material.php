<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    public function recipe()
	{
	  return $this->belongsTo(Recipe::class);
	}
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    public function recipes()
	{
	  return $this->belongsToMany(Recipe::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}

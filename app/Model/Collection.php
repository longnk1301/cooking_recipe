<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    public function recipes()
	{
	  return $this->belongsToMany(Recipe::class);
	}

	public function user()
	{
		return $thus->belongsTo(User::class);
	}
}

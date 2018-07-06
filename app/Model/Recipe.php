<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    public function materials()
	{
	  return $this->hasMany(Material::class);
	}

	public function diffculty()
	{
	  return $this->belongsTo(Diffculty::class);
	}

	public function courses()
	{
	  return $this->belongsToMany(Course::class);
	}
}

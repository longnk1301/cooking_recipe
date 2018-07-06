<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
	protected $fillable = [
		'name',
		'time',
		'section',
		'like',
		'cuisine',
		'avatar',
		'diffculty_id',
		'dish_type_id',
		'user_id',
		'collection_id',
		'cooking_method_id',
		'status',
	];

    public function materials()
	{
	  return $this->hasMany(Material::class);
	}

	public function comments()
	{
	  return $this->hasMany(Comment::class);
	}

	public function makings()
	{
	  return $this->hasMany(Making::class);
	}

	public function likes()
	{
	  return $this->hasMany(Like::class);
	}

	public function diffculty()
	{
	  return $this->belongsTo(Diffculty::class);
	}

	public function user()
	{
	  return $this->belongsTo(User::class);
	}

	public function dishType()
	{
	  return $this->belongsTo(DishType::class);
	}

	public function courses()
	{
	  return $this->belongsToMany(Course::class);
	}

	public function occasions()
	{
	  return $this->belongsToMany(Occasion::class);
	}

	public function purposes()
	{
	  return $this->belongsToMany(Purpose::class);
	}

	public function cookingMethod()
	{
	  return $this->belongsTo(CookingMethod::class);
	}

	public function rates()
	{
	  return $this->belongsToMany(Rate::class);
	}

	public function collections()
	{
	  return $this->belongsToMany(Collection::class);
	}

	// public function images()
	// {
	//   return $this->hasMany(Image::class);
	// }
}

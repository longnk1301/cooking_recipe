<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Care extends Model
{
	protected $fillable = [
        'care',
        'user_id',
        'who',
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}

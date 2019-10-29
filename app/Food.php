<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
	public function restaurant ()
	{
		return $this->belongsTo(Restaurant::class);
    }

	public function Category ()
	{
		return $this->belongsTo(Category::class);
    }
}

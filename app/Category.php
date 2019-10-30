<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	public function Slide ()
	{
		return $this->hasOne(Slide::class);
    }

	public function foods ()
	{
		return $this->hasMany(Food::class);
    }
}

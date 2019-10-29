<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
	protected $casts = [
		'options' => 'array'
	];

	public function foods ()
	{
		return $this->hasMany(Food::class);
    }

	public function categories ()
	{
		return $this->hasMany(Category::class);
    }

}

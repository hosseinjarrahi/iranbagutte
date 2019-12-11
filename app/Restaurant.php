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

    public function slides()
    {
        return $this->hasMany(Slide::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

}

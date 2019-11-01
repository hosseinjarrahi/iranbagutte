<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
	/**
	 * @param \Eloquent $query
	 * @return mixed
	 */
	public function scopeRandomTextBanner ($query)
	{
		return $query->where('text', '!=' , null)->inRandomOrder();
	}

	public function scopeRandomNormalBanner ($query)
	{
		return $query->where('state' , '<' , 2)->inRandomOrder();
	}

	public function scopeRandomDynamicBanner ($query)
	{
		return $query->where('state' , 2)->inRandomOrder();
	}
}

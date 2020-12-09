<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'foods';

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id','id');
    }
    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
    public function scopeSearch($query , $keyword)
    {
        $query->where('title', 'LIKE', '%' . $keyword . '%');
        return $query;
    }
}

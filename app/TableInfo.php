<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableInfo extends Model
{
    protected $fillable=['restaurant_id','img1','img2','price'];
    public function restaurant()
    {
        return $this->hasOne(Restaurant::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}

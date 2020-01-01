<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    protected $casts = [
        'tables' => 'json',
    ];

    protected $dates = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    public function getTablesAttribute()
    {
        return collect(json_decode($this->attributes['tables']));
    }
}

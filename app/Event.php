<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['restaurant_id', 'game_id', 'title', 'text'];

    public function game()
    {
        return $this->hasOne(Game::class, 'id', 'game_id');
    }

    public function restaurant()
    {
        return $this->hasOne(Restaurant::class, 'id', 'restaurant_id');
    }

    public function buycodes()
    {
        return $this->hasMany(Buycode::class);
    }
}

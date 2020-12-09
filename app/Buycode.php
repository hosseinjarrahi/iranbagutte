<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buycode extends Model
{
    protected $guarded = ['id'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function product()
    {
        return $this->belongsTo(Food::class,'product_id','id');
    }

    public function game()
    {
        return $this->belongsTo(Game::class,'game_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=['body','name','email','status','item_id','role','status'];
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
    public function game()
    {
        return $this->belongsTo(Game::class,'item_id','id');
    }

}

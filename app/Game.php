<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable=['user_id','status','special','file','name','description','poster','part','full'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comment()
    {
        return $this->hasMany(Comment::class,'item_id','id');
    }
    public function scopeSearch($query , $keyword)
    {
        $query->where('name', 'LIKE', '%' . $keyword . '%');
        return $query;
    }
}

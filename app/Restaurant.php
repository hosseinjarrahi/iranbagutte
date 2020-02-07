<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable=['name','pics','options'];
    protected $casts = [
        'options' => 'Array',
        'pics' => 'Array'
    ];


    public function comment()
    {
        return $this->hasMany(Comment::class,'item_id','id');
    }


    public function foods()
    {
        return $this->hasMany(Food::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function slides()
    {
        return $this->hasMany(Slide::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function reserves()
    {
        return $this->hasMany(Reserve::class);
    }

    public function tables()
    {
        return $this->hasMany(Table::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function getOptionsAttribute($value)
    {
        return (json_decode($value));
    }
}

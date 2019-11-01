<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id', 'email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

	public function buycodes ()
	{
		return $this->hasMany(Buycode::class);
    }

	public function buycodesWith (Game $game)
	{
		return $this->buycodes()->where('game_id',$game->id)->get();
    }
    
	public function roles ()
	{
		return $this->hasMany(Role::class);
    }

	public function payments ()
	{
		return $this->hasMany(Payment::class);
    }

	public function payedThisGame ($game)
	{
		return !$this->payments()->where('products',$game->id)->get()->isEmpty();
    }
}

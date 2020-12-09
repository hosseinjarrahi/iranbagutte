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
    public function restaurants()
    {
        return $this->belongsTo(Restaurant::class, 'res_id');
    }
    public function buycodes()
    {
        return $this->hasMany(Buycode::class);
    }

    public function buycodesWith(Game $game)
    {
        return $this->buycodes()->where('game_id', $game->id)->get();
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function payedThisGame($game)
    {
        return !$this->payments()->where('products', $game->id)->get()->isEmpty();
    }

    public function hasRole($role)
    {
        if ($role == 'any') {
            if (session('isAdmin'))
                return true;
            if (!$this->roles->isEmpty()) {
                session(['isAdmin' => 1]);
                return true;
            }
            return false;
        }

        if ($this->roles->where('access', $role)->isEmpty()
            && $this->roles->where('access', 'admin')->isEmpty())
            return false;
        session(['isAdmin' => 1]);
        return true;
    }

    public static function login($username, $password)
    {
        $user = self::where('username', $username)->first();
        if ($user && \Hash::check($password, $user->password)) {
            if (\Auth::loginUsingId($user->id))
                return redirect('/');
            return back();
        } else
            return redirect('login')->with(['error' => 'نام کاربری و یا رمز اشتباه است.']);
    }

    public function paidAdvertise()
    {
        $pay = Payment::where('products','"advertise'.$this->id.'"')->first();
        return !!$pay;
    }

}

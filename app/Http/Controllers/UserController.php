<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function loginPage()
    {
        if(\Auth::check())
            return back();
        return view('user.login');
    }

    public function login(Request $request)
    {
        return User::login($request->username, $request->password);
    }

    public function logout()
    {
        if(\Auth::check())
            \Auth::logoutCurrentDevice();
        return redirect('/');
    }
}

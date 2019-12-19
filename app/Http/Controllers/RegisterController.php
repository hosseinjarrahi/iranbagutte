<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class RegisterController extends Controller
{
    //register show
    public function show()
    {
        return view('user.register');
    }


    public function register(Request $request)
    {
        $res = false;
        $errors = [];
        $user = null;
        if((User::where('username',$request->username[0])->get())->isEmpty())
        {
            $user = new User;
            $user->username = $request->username;
            $user->password = bcrypt($request->password);
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->name = $request->name;
            $res = $user->save();
        }
        else
            $errors['username'] = "نام کاربری وارد شده تکراری می باشد.";

        if($res)
        {
            return redirect('/');
        }
        else
        {
            return view('user.register',compact('errors','user'));
        }

    }
}

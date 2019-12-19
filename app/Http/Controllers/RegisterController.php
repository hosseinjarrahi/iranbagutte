<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class RegisterController extends Controller
{
    //register show
    public function show()
    {
//        Auth::redirect(url());
        return view('user.register');
    }


    public function register()
    {
//        Auth::redirect(url());
        $res = false;
        $errors = [];
        $post = $_POST;
        $user = null;
        if(empty(User::where('username',$post['username'][0])))
        {
            $user = new User;
            $user->username = $post['username'];
            $user->password = hash($post['password']);
            $user->email = $post['email'];
            $user->phone = $post['phone'];
            $user->fname = $post['fName'];
            $user->lname = $post['lName'];
            $res = $user->save();
            $errors = $user->errors->first();
        }
        else
            $errors['username'] = "نام کاربری وارد شده تکراری می باشد.";

        if($res)
        {
//            Auth::login($post['username'],$post['password']);
            header('Location: '.url());
        }
        else
        {
            return view('user.register',compact('errors','user'));
        }

    }
}

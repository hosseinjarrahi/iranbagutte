<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function show()
    {
//        Auth::redirect('admin/home','admin');
        return view('admin.login');
    }

    public function login()
    {
        $post = $_POST;
//        Auth::adminLogin($post['username'],$post['password']);
        header('Location: '.url('admin/login'));
    }

    public function logout()
    {
//        Auth::logout('admin');
        header('Location: '.url('admin/login'));
    }

    public function home()
    {
//        Auth::redirectToLogin('admin/login','admin');
        return view('admin.dashboard');
    }

    public function cyberspace()
    {
        return view('admin.manageCyberspace');
    }
}

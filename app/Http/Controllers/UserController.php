<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('Access:users');
    }

    public function showUsers()
    {
        $users = User::paginate(10);
        return view('admin.manageUsers', compact('users'));
    }

    public function showUser($id)
    {
        $user = User::find($id);
        $role = $user->roles;
        return view('admin.showUser', compact('user', 'role'));
    }

    public function remove($id)
    {
        $user = User::find($id);
        if ($user)
            $user->delete();
        return back();
    }

    public function promote($id, Request $request)
    {
        $user = User::find($id);
        $roles = $user->roles;
        foreach ($roles as $role)
            $user->roles()->detach($role->id);
        $roles = $request->except('_token');
        foreach ($roles as $key => $role) {
            $r = Role::where('access',$key)->first();
            $user->roles()->attach($r->id);
        }
        return back();
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function show()
    {
        if(!auth()->user()->hasRole('any'))
            abort(404);
        return view('admin.dashboard');
    }
}

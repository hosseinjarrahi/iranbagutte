<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OffController extends Controller
{
    function index(){
        return view('admin.offs');
    }
}

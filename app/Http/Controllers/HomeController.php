<?php

namespace App\Http\Controllers;

use App\Option;
use App\Slide;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function home ()
	{
		$home = 1;
		$op = Option::first();
		$slides = Slide::where('restaurant_id',1)->with('category')->get();
		$op->main = str_replace('../','',$op->main);
		$op->main = str_replace('width="','class="img-fluid"',$op->main);
		$op->main = str_replace('height="','',$op->main);
		return view('home',compact('op','home','slides'));
	}

}

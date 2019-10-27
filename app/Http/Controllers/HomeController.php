<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function home ()
	{
		$home = 1;
		$op = Options::findById(1)[0];
		$slides = Slide::findByRes(-1);
		$op->main = str_replace('../','',$op->main);
		$op->main = str_replace('width="','class="img-fluid"',$op->main);
		$op->main = str_replace('height="','',$op->main);
		return view('home',compact('op','home','slides'));
	}

}

<?php

namespace App\Http\Controllers;

use App\Option;
use App\Restaurant;
use App\Slide;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function home ()
	{
		$home = 1;
		$op = Option::first();
		$slides = Slide::where('restaurant_id' , 1)->with('category')->get();
//		$op->main = str_replace('../' , '' , $op->main);
//		$op->main = str_replace('width="' , 'class="img-fluid"' , $op->main);
//		$op->main = str_replace('height="' , '' , $op->main);
		return view('home' , compact('op' , 'home' , 'slides'));
	}

	public function benefits ()
	{
		$benefits = Option::all()[1];
		$benefits->main = str_replace('../' , '' , $benefits->main);
		$benefits->main = str_replace('width="' , 'class="img-fluid"' , $benefits->main);
		$benefits->main = str_replace('height="' , '' , $benefits->main);
		return view('benefits' , compact('benefits'));
	}

	public function contactUs ()
	{
		$contactUs = Option::all()[1];
		$contactUs->main = str_replace('../' , '' , $contactUs->main);
		$contactUs->main = str_replace('width="' , 'class="img-fluid"' , $contactUs->main);
		$contactUs->main = str_replace('height="' , '' , $contactUs->main);
		return view('contact-us' , compact('contactUs'));
	}

	public function showRestaurant (Restaurant $restaurant)
	{
		$home = 1;
		$cats = $restaurant->categories;
		$foods = $restaurant->foods();
		return view('restaurant' , compact( 'cats' , 'home' , 'foods' , 'restaurant'));
	}
}

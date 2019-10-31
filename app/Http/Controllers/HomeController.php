<?php

namespace App\Http\Controllers;

use App\Category;
use App\Food;
use App\Game;
use App\Option;
use App\Restaurant;
use App\Slide;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

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
		$foods = $restaurant->foods()->paginate(6);
		return view('restaurant' , compact( 'cats' , 'home' , 'foods' , 'restaurant'));
	}

	public function showFood(Food $food,$alert = null)
	{
		return view('food',compact('food','alert'));
	}

	public function gamesPage ()
	{
		$games = Game::where('status',1)->paginate(6);
		return view('game.gamesPage' , compact('games'));
	}

	public function ajax(Request $request)
	{
		/**
		 * @var LengthAwarePaginator $foods
		 */
		$foods = (Category::find($request->id))->foods;
		$foods->map(function($item){
			$item->url = url('food/'.$item->id);
			$item->img = asset('upload/'.$item->img);
		});
		echo $foods->toJson();
	}

}

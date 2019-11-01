<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Buycode;
use App\Category;
use App\Food;
use App\Game;
use App\Option;
use App\Restaurant;
use App\Slide;
use App\User;
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
		return view('restaurant' , compact('cats' , 'home' , 'foods' , 'restaurant'));
	}

	public function showFood (Food $food , $alert = null)
	{
		return view('food' , compact('food' , 'alert'));
	}

	public function game (Game $game)
	{
		$dynamic = Banner::randomDynamicBanner()->first(); // start the game banner
		$zirnevis = Banner::randomTextBanner()->first(); // zirnevis
		$banners = Banner::randomNormalBanner()->get(); // upp and down banners
		$urls = ["1" => asset($game->file.'/part1/index.html')];
		$part = 1;

		if(auth()->check()) {
			$user = auth()->user();
			$part = $user->buycodesWith($game)->count()+1;
		}

		for ( $i = 2 ; $i <= $part ; $i++ ) {
			$urls[$i] = asset($game->file.'/part'.$i.'/index.html');
		}
		return view('game' , compact('dynamic' , 'urls' , 'zirnevis' , 'banners' , 'part' , 'game'));
	}

	public function gamesPage ()
	{
		$games = Game::where('status' , 1)->paginate(6);
		return view('gamesPage' , compact('games'));
	}

	public function checkBuycode (Request $request)
	{
		auth()->loginUsingId(1);
		dd(auth()->user());
		$code = $request->buy_code;
		$buycode = Buycode::where('code',$code)->first();
		$user = User::find(1);
		if($buycode->user_id == $user->id)
		{
			$buycode->game_id = $request->id;
			$buycode->save();
		}
		return back();
	}

	public function ajax (Request $request)
	{
		/**
		 * @var LengthAwarePaginator $foods
		 */
		$foods = (Category::find($request->id))->foods;
		$foods->map(function ($item) {
			$item->url = url('food/'.$item->id);
			$item->img = asset('upload/'.$item->img);
		});
		echo $foods->toJson();
	}

}

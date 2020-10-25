<?php

namespace App\Http\Controllers;

use App\Cyberspace;
use App\Food;
use App\Game;
use App\Restaurant;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function show()
    {
        $key = request('keyword');
        $foods = Food::search($key)->latest()->get();
        $restaurants = Restaurant::search($key)->latest()->get();
        $games = Game::search($key)->latest()->get();
        $cyberspace = Cyberspace::get();

        return view('search', compact('games', 'foods', 'restaurants', 'cyberspace'));
    }
}

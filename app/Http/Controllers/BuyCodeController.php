<?php

namespace App\Http\Controllers;

use App\Buycode;
use App\Food;
use App\Game;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BuyCodeController extends Controller
{
    public function index()
    {
        $buyCodes = Buycode::where('by_admin', true)->get();
        $games = Game::all();
        $foods = Food::all();
        return view('admin.buycode', compact('buyCodes', 'games', 'foods'));
    }

    public function store(Request $request)
    {
        foreach (range(1, $request->count ?? 0) as $number) {
            Buycode::create($request->only([
                    'game_id',
                    'product_id',
                    'event_id',
                    'percent',
                ]) + ['by_admin' => true, 'code' => Str::random(7)]);
        }

        return back();
    }

    public function destroy($id)
    {
        $buycode = Buycode::findOrFail($id);
        $buycode->delete();

        return back();
    }

    public function myCode()
    {
        $mycode = Buycode::all()->where('user_id', auth()->user()->id);
        $pay_user = Payment::all()->where('user_id', auth()->user()->id);
        $i = 0;
        $games = [];
        foreach ($pay_user as $pay) {
            if (is_numeric($pay->products)) {
                $games[$i++] = $pay;
            }
        }

        return view('admin.off.myCode', compact('mycode', 'games'));
    }

    public function userMyCode()
    {
        $mycode = Buycode::all()->where('user_id', auth()->user()->id);
        $pay_user = Payment::all()->where('user_id', auth()->user()->id);
        $i = 0;
        $games = [];
        foreach ($pay_user as $pay) {
            if (is_numeric($pay->products)) {
                $games[$i++] = $pay;
            }
        }

        return view('user.myCode', compact('mycode', 'games'));
    }
}

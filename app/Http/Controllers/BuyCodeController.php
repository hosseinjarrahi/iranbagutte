<?php

namespace App\Http\Controllers;

use App\Buycode;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BuyCodeController extends Controller
{
    public function index()
    {
        $buyCodes = Buycode::where('by_admin', true)->get();

        return view('admin.buycode', compact('buyCodes'));
    }

    public function store(Request $request)
    {
        foreach (range(1, $request->count ?? 0) as $number) {
            Buycode::create($request->only([
                    'game_id',
                    'product_id',
                    'event_id',
                    'percent',
                ]) + ['by_admin' => true,'code' => Str::random(7)]);
        }

        return back();
    }

    public function destroy($id)
    {
        $buycode = Buycode::findOrFail($id);
        $buycode->delete();

        return back();
    }
}

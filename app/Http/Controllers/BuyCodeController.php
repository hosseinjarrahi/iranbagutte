<?php

namespace App\Http\Controllers;

use App\Buycode;
use Illuminate\Http\Request;

class BuyCodeController extends Controller
{
    public function index()
    {
        $buyCodes = Buycode::where('by_admin',true)->get();

        return view('admin.buycode',compact('buyCodes'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Buycode::create($request->only([
            'code',
            'game_id',
            'product_id',
            'event_id',
            'percent',
        ]) + ['by_admin' => true]);

        return back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $buycode = Buycode::findOrFail($id);
        $buycode->delete();

        return back();
    }
}

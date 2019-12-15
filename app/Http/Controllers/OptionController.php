<?php

namespace App\Http\Controllers;

use App\Restaurant;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('Access:detail');
    }

    public function detail ()
    {
        $res = Restaurant::find(1);
        return view('admin.detailsRes' , compact('res'));
    }

    public function editDetail (Request $request)
    {
        $res = Restaurant::find(1);
        $res->name = $request->name;
        $res->time1 = $request->time1;
        $res->time2 = $request->time2;
        $res->delivery = $request->delivery;
        $res->wifi = $request->wifi;
        $res->game = $request->game;
        $res->park = $request->park;
        $res->child_bench = $request->child_bench;
        $res->kart = $request->kart;
        $res->music = $request->music;
        $res->details = $request->details;
        $res->save();
        return redirect(url('admin/detail-res'));
    }

}

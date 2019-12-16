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
        $res = Restaurant::find(auth()->id());
        $res->options = json_decode($res->options);
        return view('admin.detailsRes' , compact('res'));
    }

    public function editDetail (Request $request)
    {
        $res = Restaurant::find(auth()->id());
        $request->validate([
            'img' => 'mimes:jpeg,bmp,jpg,png|max:500kb'
        ]);
        $options = [];
        $res->name= $request->name;
        $options['start']= $request->time1;
        $options['end']= $request->time2;
        $options['delivery']= $request->delivery;
        $options['wifi']= $request->wifi;
        $options['game']= $request->game;
        $options['park']= $request->park;
        $options['child_bench']= $request->child_bench;
        $options['kart']= $request->kart;
        $options['music']= $request->music;
        $options['details']= $request->details;
        $res->options = json_encode($options);
        $file = $request->file('img');
        if ( $request->hasFile('img') && !is_null($request->img) ) {
            $path = random_int(0 , 99999).time().'_.'.$request->img->getClientOriginalExtension();
            $request->img->move(public_path('upload') , $path);
            $imgPath = $path;
            $res->pics = $imgPath;
        }
        $res->save();
        return redirect(url('manager/detail-res'));
    }

}

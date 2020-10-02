<?php

namespace App\Http\Controllers;

use App\Option;
use App\Restaurant;
use App\User;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function detail()
    {
        $this->middleware('Access:settings');

        $user = User::find(auth()->id());
        $res = Restaurant::find($user->res_id);
        //$res->options = $res->options;
        return view('admin.detailsRes', compact('res'));
    }

    public function editDetail(Request $request)
    {
        $this->middleware('Access:settings');

        $res = Restaurant::find(auth()->id());
        $request->validate([
            'img' => 'mimes:jpeg,bmp,jpg,png|max:500kb'
        ]);
        $options = [];
        $res->name = $request->name;
        $options['start'] = $request->time1;
        $options['address'] = $request->address;
        $options['end'] = $request->time2;
        $options['delivery'] = $request->delivery;
        $options['wifi'] = $request->wifi;
        $options['game'] = $request->game;
        $options['park'] = $request->park;
        $options['child_bench'] = $request->child_bench;
        $options['kart'] = $request->kart;
        $options['music'] = $request->music;
        $options['details'] = $request->details;
        $res->options = $options;
        $file = $request->file('img');
        if ($request->hasFile('img') && !is_null($request->img)) {
            $path = random_int(0, 99999) . time() . '_.' . $request->img->getClientOriginalExtension();
            $request->img->move(public_path('upload'), $path);
            $imgPath = $path;
            $res->pics = [$imgPath];
        }
        $res->save();
        return redirect(url('manager/detail-res'));
    }

    public function aboutUs()
    {
        $op = Option::first();
        return view('admin.aboutUs', compact('op'));
    }

    public function addAbout(Request $request)
    {
        $op = Option::first();
        $op->main = $request->main;
        $op->save();
        return redirect('manager/about-us');
    }

    public function call()
    {
        $op = Option::find(3) ?? Option::create(['id' => 3, 'main' => '']);
        return view('admin.call', compact('op'));
    }

    public function addCall(Request $request)
    {
        $op = Option::find(3) ?? new Option(['id' => 3]);
        $op->main = $request->main;
        $op->save();
        return redirect('manager/call');
    }

    public function delivery()
    {
        $op = Option::find(4) ?? Option::create(['id' => 4, 'main' => '']);
        return view('admin.delivery', compact('op'));
    }

    public function addDelivery(Request $request)
    {
        $op = Option::find(4) ?? new Option(['id' => 4]);
        $op->main = $request->main;
        $op->save();
        return redirect('manager/delivery');
    }

    public function benefits()
    {
        $op = Option::find(2) ?? Option::create(['id' => 2]);
        return view('admin.benefits', compact('op'));
    }

    public function addBenefits(Request $request)
    {
        $op = Option::find(2) ?? new Option(['id' => 2]);
        $op->main = $request->main;
        $op->save();
        return redirect('manager/benefits');
    }

    public function upload(Request $request)
    {
        $path = $request->file('file')->store('images','public');
        return response(['location' => '/'.$path]);
    }

}

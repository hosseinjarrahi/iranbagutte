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

    //WorkWithUs

    public function WorkWithUs()
    {
        $op = Option::find(9) ?? Option::create(['id' => 9]);
        return view('admin.homePages.workWithUs', compact('op'));
    }

    public function addWorkWithUs(Request $request)
    {
        $op = Option::find(9) ?? new Option(['id' => 9]);
        $op->main = $request->main;
        $op->save();
        return redirect('manager/homePages/workWithUs');
    }

    //HowToOrder

    public function HowToOrder()
    {
        $op = Option::find(10) ?? Option::create(['id' => 10]);
        return view('admin.homePages.howToOrder', compact('op'));
    }

    public function addHowToOrder(Request $request)
    {
        $op = Option::find(10) ?? new Option(['id' => 10]);
        $op->main = $request->main;
        $op->save();
        return redirect('manager/homePages/howToOrder');
    }

    //ContactUs

    public function ContactUs()
    {
        $op = Option::find(5) ?? Option::create(['id' => 5]);
        return view('admin.homePages.contactUs', compact('op'));
    }

    public function addContactUs(Request $request)
    {
        $op = Option::find(5) ?? new Option(['id' => 5]);
        $op->main = $request->main;
        $op->save();
        return redirect('manager/homePages/contactUs');
    }

    //CollaborateWithGameMakers

    public function CollaborateWithGameMakers()
    {
        $op = Option::find(6) ?? Option::create(['id' => 6]);
        return view('admin.homePages.collaborateWithGameMakers', compact('op'));
    }

    public function addCollaborateWithGameMakers(Request $request)
    {
        $op = Option::find(6) ?? new Option(['id' => 6]);
        $op->main = $request->main;
        $op->save();
        return redirect('manager/homePages/collaborateWithGameMakers');
    }

    //WorkWithUs

    public function MakeAGameForUs()
    {
        $op = Option::find(7) ?? Option::create(['id' => 7]);
        return view('admin.homePages.makeAGameForUs', compact('op'));
    }

    public function addMakeAGameForUs(Request $request)
    {
        $op = Option::find(7) ?? new Option(['id' => 7]);
        $op->main = $request->main;
        $op->save();
        return redirect('manager/homePages/makeAGameForUs');
    }

    //CooperationWithFastFoods

    public function CooperationWithFastFoods()
    {
        $op = Option::find(8) ?? Option::create(['id' => 8]);
        return view('admin.homePages.cooperationWithFastFoods', compact('op'));
    }

    public function addCooperationWithFastFoods(Request $request)
    {
        $op = Option::find(8) ?? new Option(['id' => 8]);
        $op->main = $request->main;
        $op->save();
        return redirect('manager/homePages/cooperationWithFastFoods');
    }





    public function upload(Request $request)
    {
        $path = $request->file('file')->store('images','public');
        return response(['location' => '/'.$path]);
    }

}

<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Option;
use Illuminate\Http\Request;

class AdvertiseController extends Controller
{
    public function __construct()
    {
        $this->middleware('Access:advertise');
    }

    public function show()
    {
        $ads = Banner::where('state', '<', '2')->get();
        return view('admin.advertise', compact('ads'));
    }

    public function showAdvUser()
    {
        return view('admin.advertiseUser.advertiseUser');
    }

    public function delete($id)
    {
        $id = (int)$id;
        $ad = Banner::find($id);
        $this->deleteFile('upload/' . $ad->img);
        $ad->delete();
        return back();
    }

    public function add(Request $request)
    {
        $ad = new Banner;
        $ad->state = $request->state;
        $ad->url = $request->url;
        $file = $request->file('img');
        if ($request->hasFile('img') && !is_null($request->img)) {
            $path = random_int(0, 99999) . time() . '_.' . $request->img->getClientOriginalExtension();
            $file->move(public_path('upload'), $path);
            $ad->img = $path;
        }
        $ad->save();
        return back();
    }

    // dynamic
    public function dynamicManage()
    {
        $ads = Banner::where('state', 2)->get();
        return view('admin.dynamicManage', compact('ads', 'option'));
    }

    public function dynamicAdd(Request $request)
    {
        $ad = new Banner;
        $ad->state = 2;
        $ad->time = $request->time;
        $ad->url = $request->url;
        $file = $request->file('img');
        if ($request->hasFile('imgdynamicDelete') && !is_null($request->img)) {
            $path = random_int(0, 99999) . time() . '_.' . $request->img->getClientOriginalExtension();
            $file->move(public_path('upload'), $path);
            $ad->img = $path;
        }
        $ad->save();
        return back();
    }

    // zirnevis
    public function zirnevisManage()
    {
        $ads = Banner::where('state', null)->get();
        return view('admin.zirnevisManage', compact('ads'));
    }

    public function zirnevisAdd(Request $request)
    {
        $ad = new Banner;
        $ad->state = null;
        $ad->time = $request->time;
        $ad->url = $request->url;
        $ad->text = $request->text;
        $ad->save();
        return back();
    }

    public function deleteFile($file)
    {
        $file = (isset(glob($file)[0])) ? glob($file)[0] : 'nothing';
        if (is_file($file))
            unlink($file);
    }

    public function adverPrice(Request $request)
    {
        $option = Option::find(10);
        $option = $option ?? Option::create(['id' => 10, 'main' => 10000]);

        return view('admin.advertisePrice', compact('option'));
    }

    public function adverPriceChange(Request $request)
    {
        $option = Option::find(10);
        $option->main = $request->price;
        $option->save();

        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Reserve;
use App\Restaurant;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('Access:tables');
    }

    public function sitSetting()
    {
        $opt = Restaurant::find(auth()->id())->reserves;
        return view('admin.sitSetting',compact('opt'));
    }

    public function addSit(Request $request)
    {
        $sit = new Reserve();
        $sit->capacity = $request->capacity;
        $sit->resid = auth()->id;
        $sit->save();
        return redirect('manager/sit/setting');
    }

    public function rmvSit($id)
    {
        $sit = Reserve::find($id);
        $sit->delete();
        return redirect('manager/sit/setting');
    }

    public function showReserved()
    {
        $reserve = Reserve::where('res','=','-1','time_s|ASC');
        return view('admin.manageReserved',compact('reserve'));
    }
}

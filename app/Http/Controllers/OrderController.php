<?php

namespace App\Http\Controllers;

use App\Reserve;
use App\Restaurant;
use App\Table;
use App\TableInfo;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('Access:tables');
    }

    public function sitSetting()
    {
        $opt = Restaurant::find(auth()->id())->tables;

        $tableInfo= Restaurant::find(auth()->id())->tableInfos;

        return view('admin.sitSetting',compact('opt','tableInfo'));
    }

    public function addSit(Request $request)
    {
        $sit = new Table();
        $sit->capacity = $request->capacity;
        $sit->restaurant_id = auth()->id();
        $sit->save();
        return back();
    }

    public function rmvSit($id)
    {
        $sit = Table::find($id);
        $sit->delete();
        return redirect('manager/sit/setting');
    }

    public function showReserved()
    {
        $reserve = Reserve::where('restaurant_id',auth()->id())->paginate(10);
        return view('admin.manageReserved',compact('reserve'));
    }
}

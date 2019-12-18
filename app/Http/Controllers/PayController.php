<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;

class PayController extends Controller
{
    public function __construct()
    {
        $this->middleware('Access:payments');
    }

    public function show()
    {
        if (auth()->user()->hasRole('admin'))
            $allPay = Payment::with('user')->with('restaurant')->paginate(10);
        else
            $allPay = Payment::where('restaurant_id', auth()->id())->paginate(10);
        return view('admin.payList', compact('allPay'));
    }

    public function removePay($id)
    {
        $itemPay = Payment::find($id);
        $itemPay->delete();
        return redirect('manager/manage-pays');
    }

    public function detailPay($id)
    {
        $pay = Payment::with(['user','restaurant'])->where('id',$id)->first();
        $products = json_decode($pay->products);
        return view('admin.detailPayList', compact('products','pay'));
    }
}

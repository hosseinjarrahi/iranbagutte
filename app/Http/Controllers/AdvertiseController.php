<?php

namespace App\Http\Controllers;
use App\Banner;
use Illuminate\Http\Request;

class AdvertiseController extends Controller
{
    public function __construct ()
    {
        $this->middleware('Access:advertise');
    }

    public function show ()
    {
        $ads = Banner::all();
        return view('admin.advertise' , compact('ads'));
    }

    public function delete ($id)
    {
        $id = (int) $id;
        $ad = Banner::findById($id)[0];
        deleteFile('upload/'.$ad->img);
        $ad->delete();
        return header('Location: '.url('manager/advertise'));
    }

    public function add ()
    {
        $ad = new Banner;
        $ad->state = $_POST['state'];
        $ad->url = $_POST['url'];
        $ad->save();
        return header('Location: '.url('manager/advertise'));
    }

    // dynamic
    public function dynamicManage ()
    {
        $ads = Banner::findByState(2);
        return view('admin.dynamicManage',compact('ads'));
    }

    public function dynamicDelete ($id)
    {
        $id = (int) $id;
        $ad = Banner::findById($id)[0];
        deleteFile('upload/'.$ad->img);
        $ad->delete();
        return header('Location: '.url('manager/advertise/dynamic'));
    }

    public function dynamicAdd ()
    {
        $ad = new Banner;
        $ad->state = 2;
        $ad->time = $_POST['time'];
        $ad->url = $_POST['url'];
        $ad->save();
        return header('Location: '.url('manager/advertise/dynamic'));
    }
    // zirnevis
    public function zirnevisManage ()
    {
        $ads = Banner::findByState(3);
        return view('admin.zirnevisManage',compact('ads'));
    }

    public function zirnevisDelete ($id)
    {
        $id = (int) $id;
        $ad = Banner::findById($id)[0];
        deleteFile('upload/'.$ad->img);
        $ad->delete();
        return header('Location: '.url('manager/advertise/zirnevis'));
    }

    public function zirnevisAdd ()
    {
        $ad = new Banner;
        $ad->state = 3;
        $ad->time = $_POST['time'];
        $ad->url = $_POST['url'];
        $ad->text = $_POST['text'];
        $ad->save();
        return header('Location: '.url('manager/advertise/zirnevis'));
    }
}

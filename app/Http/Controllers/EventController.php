<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Cyberspace;
use App\Event;
use App\Game;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;

class EventController extends Controller
{

    public function index()
    {
        $event=Event::all()->first();
        $game=Game::find($event->game_id);

        $comments = $game->comment()->where('status', 1)->where('role', 1)->get(); // comments
        $dynamic = Banner::randomDynamicBanner()->first(); // start the game banner
        $zirnevis = Banner::randomTextBanner()->first(); // zirnevis
        $banners = Banner::randomNormalBanner()->get(); // upp and down banners
        $urls = ["1" => asset($game->file . '/part1/index.html')];
        $part = 1;

        if (auth()->check()) {
            $user = auth()->user();
            $part = $user->buycodesWith($game)->count() + 1;
        }

        for ($i = 2; $i <= $part; $i++) {
            $urls[$i] = asset($game->file . '/part' . $i . '/index.html');
        }
        $cyberspace = Cyberspace::get();
        return view('event', compact('dynamic', 'urls', 'zirnevis', 'banners', 'part', 'game', 'comments', 'cyberspace'));

    }

    public function create()
    {
        return view('admin.event.create');

    }

    public function store(Request $request)
    {

        $messages = [
            'title.required' => 'فیلد عنوان را وارد نمایید.',
            'restaurant_id.required' => 'فیلد ID رستوران را وارد نمایید.',
            'game_id.required' => 'فیلد ID بازی را وارد نمایید.',
            'text.required' => 'فیلد متن را وارد نمایید.',
        ];
        $validateCategory = $request->validate([
            'title' => 'required',
            'restaurant_id' => 'required',
            'game_id' => 'required',
            'text' => 'required',
        ], $messages);
        $event=new Event();
        try {
            $event->title=$request->title;
            $event->text=$request->text;
            $event->restaurant_id=$request->restaurant_id;
            $event->game_id=$request->game_id;

            $request->start_time = $this->faTOen($request->start_time);
            $date = explode('-', $request->start_time);
            $time = explode(':', substr($date[2], '3'));
            $date[2] = substr($date[2], '0', '2');
            $event->start_time = new Jalalian($date[0], $date[1], $date[2], $time[0], $time[1]);

            $request->end_time = $this->faTOen($request->end_time);
            $date = explode('-', $request->end_time);
            $time = explode(':', substr($date[2], '3'));
            $date[2] = substr($date[2], '0', '2');
            $request->end_time = new Jalalian($date[0], $date[1], $date[2], $time[0], $time[1]);


            $event->save();
        } catch (Exception $exception) {
            return redirect(route('admin.event.edit'))->with('warning', $exception->getCode());
        }
        $msg = "رویداد با موفقیت ویرایش شد.";
        return redirect(route('event.show'))->with('success', $msg);
    }


    public function show()
    {
        $event=Event::all()->first();
        return view('admin.event.event',compact('event'));
    }

    public function edit($id)
    {
        $event=Event::find($id);
        return view('admin.event.edit',compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event=Event::find($id);
        $messages = [
            'title.required' => 'فیلد عنوان را وارد نمایید.',
            'restaurant_id.required' => 'فیلد ID رستوران را وارد نمایید.',
            'game_id.required' => 'فیلد ID بازی را وارد نمایید.',
            'text.required' => 'فیلد متن را وارد نمایید.',
        ];
        $validateCategory = $request->validate([
            'title' => 'required',
            'restaurant_id' => 'required',
            'game_id' => 'required',
            'text' => 'required',
        ], $messages);
        $request->start_time = $this->faTOen($request->start_time);
        $date = explode('-', $request->start_time);
        $time = explode(':', substr($date[2], '3'));
        $date[2] = substr($date[2], '0', '2');
        $event->start_time = new Jalalian($date[0], $date[1], $date[2], $time[0], $time[1]);

        $request->end_time = $this->faTOen($request->end_time);
        $date = explode('-', $request->end_time);
        $time = explode(':', substr($date[2], '3'));
        $date[2] = substr($date[2], '0', '2');
        $event->end_time = new Jalalian($date[0], $date[1], $date[2], $time[0], $time[1]);

        try {
            $event->update($request->all());
        } catch (Exception $exception) {
            return redirect(route('admin.event.edit'))->with('warning', $exception->getCode());
        }
        $msg = "رویداد با موفقیت ویرایش شد.";
        return redirect(route('event.show'))->with('success', $msg);
    }

    public function destroy( $id)
    {
        $event=Event::find($id);
        try {
            $event->delete();
        } catch (Exception $exception) {
            return redirect(route('admin.event.edit'))->with('warning', $exception->getCode());
        }
        $msg = "رویداد با موفقیت حذف شد.";
        return redirect(route('event.show'))->with('success', $msg);
    }
    function faTOen($string)
    {
        return strtr($string, [
            '۰' => '0',
            '۱' => '1',
            '۲' => '2',
            '۳' => '3',
            '۴' => '4',
            '۵' => '5',
            '۶' => '6',
            '۷' => '7',
            '۸' => '8',
            '۹' => '9',
            '٠' => '0',
            '١' => '1',
            '٢' => '2',
            '٣' => '3',
            '٤' => '4',
            '٥' => '5',
            '٦' => '6',
            '٧' => '7',
            '٨' => '8',
            '٩' => '9',
        ]);
    }

}


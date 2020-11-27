<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Cyberspace;
use App\Event;
use App\Game;
use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('event', compact('dynamic','event', 'urls', 'zirnevis', 'banners', 'part', 'game', 'comments', 'cyberspace'));

    }

    public function create()
    {
        $games=Game::all();
        $restaurants=Restaurant::all();

        return view('admin.event.create', compact('games','restaurants'));
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
            $event->start_time=$request->start_time??'۱۳۹۹-۰۸-۲۸ ۲۰:۳۲';
            $event->end_time=$request->end_time;

            $event->save();
        } catch (Exception $exception) {
            return redirect(route('event.edit'))->with('warning', $exception->getCode());
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
        $games=Game::all();
        $restaurants=Restaurant::all();

        return view('admin.event.edit',compact('event','games','restaurants'));
    }

    public function update(Request $request, $id)
    {
//        $event=Event::find($id);
        $messages = [
            'title.required' => 'فیلد عنوان را وارد نمایید.',
            'restaurant_id.required' => 'فیلد ID رستوران را وارد نمایید.',
            'game_id.required' => 'فیلد ID بازی را وارد نمایید.',
            'text.required' => 'فیلد متن را وارد نمایید.',
            'end_time.required' => 'فیلد زمان را صحيح وارد نمایید.',
        ];
        $validateCategory = $request->validate([
            'title' => 'required',
            'restaurant_id' => 'required',
            'game_id' => 'required',
            'text' => 'required',
            'end_time' => 'required',
        ], $messages);
        try {
            DB::table('events')->where('id',$id)->update(['title'=>$request->title,'restaurant_id'=>$request->restaurant_id,
                'game_id'=>$request->game_id,'text'=>$request->text,'end_time'=>$request->end_time,]);

        } catch (Exception $exception) {
            return redirect(route('event.edit'))->with('warning', $exception->getCode());
        }
//        dd($event->end_time);
        $msg = "رویداد با موفقیت ویرایش شد.";
        return redirect(route('event.show'))->with('success', $msg);
    }

    public function destroy($id)
    {
        $event=Event::find($id);
        try {
            $event->delete();
        } catch (Exception $exception) {
            return redirect(route('event.edit'))->with('warning', $exception->getCode());
        }
        $msg = "رویداد با موفقیت حذف شد.";
        return redirect(route('event.show'))->with('success', $msg);
    }
}

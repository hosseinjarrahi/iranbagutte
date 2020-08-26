<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Cyberspace;
use App\Event;
use App\Game;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.event.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

            $event->save();
        } catch (Exception $exception) {
            return redirect(route('event.edit'))->with('warning', $exception->getCode());
        }
        $msg = "رویداد با موفقیت ویرایش شد.";
        return redirect(route('event.show'))->with('success', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $event=Event::all()->first();
        return view('admin.event.event',compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event=Event::find($id);
        return view('admin.event.edit',compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        try {
            $event->update($request->all());
        } catch (Exception $exception) {
            return redirect(route('event.edit'))->with('warning', $exception->getCode());
        }
        $msg = "رویداد با موفقیت ویرایش شد.";
        return redirect(route('event.show'))->with('success', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
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

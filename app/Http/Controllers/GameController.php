<?php

namespace App\Http\Controllers;

use App\Game;
use App\Payment;
use Illuminate\Http\Request;
use ZipArchive;

class GameController extends Controller
{
    public function manage()
    {
        $games = Game::with('user')->paginate(10);
        $sells = [];
        foreach ($games as $game) {
            $sells[$game->id] = Payment::where('products',$game->id)->count();
        }
        return view('admin.manageGames', compact('games','sells'));
    }

    public function sendPage()
    {
        $games = Game::where('user_id', auth()->id())->paginate(10);
        return view('admin.sendGame', compact('games'));
    }

    public function download(Game $game)
    {
        $file = public_path($game->full);
        return response()->download($file);
    }

    public function verify(Game $game)
    {
        $game->status = 1;
        $game->save();
        return back();
    }

    public function block(Game $game)
    {
        $game->status = 0;
        $game->save();
        return back();
    }

    public function add(Request $request)
    {
        $game = new Game;
        $game->name = $request->name;
        $game->part = $request->part;
        $game->description = $request->description;
        $game->price = $request->price;
        $game->user_id = auth()->id();
        $game->status = 0;
        if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('checkGame'))
            $game->status = 1;

        $file = $request->file('poster');
        if ($request->hasFile('poster')) {
            $path = random_int(0, 99999) . time() . '_.' . $request->poster->getClientOriginalExtension();
            $file->move(public_path('upload'), $path);
            $game->poster = $path;
        }

        $file = $request->file('full');
        if ($request->hasFile('full')) {
            $path = random_int(0, 99999) . time() . '_.' . $request->full->getClientOriginalExtension();
            $file->move(public_path('games'), $path);
            $game->full = 'games/' . $path;
        }

        $file = $request->file('file');
        if ($request->hasFile('file')) {
            $path = random_int(0, 99999) . time();
            $file->move(public_path('games'), $path . '.' . $request->file->getClientOriginalExtension());
            $game->file = 'games/' . $path;
        }
        if ($game->save()) {
            $file = public_path($game->file . '.zip');
            $zip = new ZipArchive;
            $res = $zip->open($file);
            if ($res === TRUE) {
                $zip->extractTo(public_path(rtrim($game->file, '.zip')));
                $zip->close();
            } else {
                echo 'failed, code:' . $res;
                exit;
            }
        }
        return back();
    }

    public function delete($id)
    {
        $id = (int)$id;
        $game = Game::find($id);
        $this->deleteFile('upload/' . $game->poster);
        $this->deleteFile($game->file . '.zip');
        $this->deleteFile($game->file);
        $this->deleteFile($game->full);
        $game->delete();
        return back();
    }

    public function deleteFile($file)
    {
        $file = (isset(glob($file)[0])) ? glob($file)[0] : 'nothing';
        if (is_file($file))
            unlink($file);
    }

    public function special(Game $game)
    {
        if ($game->special == 1) {
            $game->update(['special'=>0]);
        } else {
            $game->update(['special'=>1]);
        }

        return back();
    }
}

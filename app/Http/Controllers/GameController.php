<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;
use ZipArchive;

class GameController extends Controller
{
    public function manage()
    {
        $games = Game::paginate(10);
        return view('admin.manageGames', compact('games'));
    }

    public function add(Request $request)
    {
        //todo: need to change upload convention
        $game = new Game;
        $game->name = $request->name;
        $game->part = $request->part;
        $game->user_id = auth()->id();
        $game->status = 0;

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
            $game->full = 'games/'.$path;
        }

        $file = $request->file('file');
        if ($request->hasFile('file')) {
            $path = random_int(0, 99999) . time() . '_.' . $request->full->getClientOriginalExtension();
            $file->move(public_path('games'), $path);
            $game->file = 'gmaes/'.$path;
        }

        if ($game->save()) {
            $file = public_path($game->file);
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
}

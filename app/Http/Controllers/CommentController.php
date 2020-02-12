<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Game;
use App\Restaurant;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

   //store for gamees
    public function storeG(Request $request, Game $game)
    {
        $validateCategory = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'body' => 'required',
//            recaptchaFieldName() => recaptchaRuleName(),

        ]);
        $game->comment()->create(
            [
                'item_id' => $request->item_id,
                'role' => $request->role,
                'name' => $request->name,
                'email' => $request->email,
                'body' => $request->body,

            ]
        );


//        Mail::to($request->email)
//            ->send(new CommentSent($request,$article));

        $msg = 'نظر شما با موفقیت ثبت شد و پس از تایید مدیریت سایت نمایش داده میشود.';
        return back()->with('success', $msg);


    }






    public function storeR(Request $request, Restaurant $restaurant)
    {
        $validateCategory = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'body' => 'required',
//            recaptchaFieldName() => recaptchaRuleName(),
        ]);

        $restaurant->comment()->create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'body' => $request->body,
                'role' => $request->role,
            ]
        );


//        Mail::to($request->email)
//            ->send(new CommentSent($request,$article));

        $msg = 'نظر شما با موفقیت ثبت شد و پس از تایید مدیریت سایت نمایش داده میشود.';
        return back()->with('success', $msg);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\back;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::orderBy('id', 'desc')->paginate(20);
        return view('admin.comments.comments', compact('comments'));
    }


    public function edit(Comment $comment)
    {
        return view('admin.comments.edit', compact('comment'));
    }


    public function update(Request $request, Comment $comment)
    {

        $messages = [
            'name.required' => 'فیلد عنوان را وارد نمایید.'
        ];
        $validateCategory = $request->validate([
            'name' => 'required'
        ], $messages);
        try {
            $comment->update($request->all());
        } catch (Exception $exception) {
            return redirect(route('admin.comments.edit'))->with('warning', $exception->getCode());
        }
        $msg = "نظر با موفقیت ویرایش شد.";
        return redirect(route('admin.comments'))->with('success', $msg);
    }

    public function destroy(Comment $comment)
    {
        try {
            $comment->delete();
        } catch (Exception $exception) {
            return redirect(route('admin.comments.edit'))->with('warning', $exception->getCode());
        }
        $msg = "نظر با موفقیت حذف شد.";
        return redirect(route('admin.comments'))->with('success', $msg);
    }

    public function updateStatus(Comment $comment)
    {
        if ($comment->status == 0) {
            $comment->status = 1;
        } else {
            $comment->status = 0;
        }
        $comment->save();
        $msg = "بروزرسانی با موفقیت افزوده شد.";
        return redirect(route('admin.comments'))->with('success', $msg);
    }
}

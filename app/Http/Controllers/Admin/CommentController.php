<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
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
        $comments=Comment::whereApproved(1)->latest()->paginate(10);
        return view('admin.comments.comments',compact('comments'));
    }

    public function show()
    {

    }
    
    public function unapproved()
    {
        $comments=Comment::where('approved',0)->latest()->paginate(10);
        return view('admin.comments.unapproved',compact('comments'));
    }

    public function update(Comment $comment)
    {
        $comment->update([
            'approved'=> '1' ,
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Verified;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        alert()->success('شما وارد سایت شدید');
        return view('home');
    }

    public function comment(Request $request)
    {
        $request->validate([
            'commentable_id'=>'required',
            'commentable_type'=>'required',
            'comment'=>'required',
            'parent_id'=>'required',
        ]);


        
        auth()->user()->comment()->create([
            'commentable_id'=>$request->commentable_id,
            'commentable_type'=>$request->commentable_type,
            'comment'=>$request->comment,
            'parent_id'=>$request->parent_id,
        ]);

        return back();
    }

}

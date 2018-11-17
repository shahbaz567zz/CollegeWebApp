<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Headlines;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $headlines = Headlines::all();
        $recentPosts = Post::latest()->limit(3)->get();
        return view('home.index', compact('headlines', 'recentPosts'));
    }

    public function comingsoon(){
        return view('comingsoon');
    }
}

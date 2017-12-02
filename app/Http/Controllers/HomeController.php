<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Thujohn\Twitter\Facades\Twitter;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tweets = array();
        if (Session::has('access_token'))
        {
            $tweets = Twitter::getUserTimeline();
        }
        return view('home', compact('tweets'));
    }

    public function language(Request $request)
    {
        session()->put("locale", $request->get('lang'));
        return \redirect()->back();
    }
}

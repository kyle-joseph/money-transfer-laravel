<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        return view('pages.index');
    }

    public function send(){
        return view('pages.send');
    }

    public function receive(){
        return view('pages.receive');
    }

    public function transactions(){
        return view('pages.transactions');
    }
}

<?php

namespace App\Http\Controllers;

use App\Challenge;
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
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tutorials = Challenge::query()->where('category', '=', 'tutorial')->get();
        return view('home', ['tutorials' => $tutorials]);
    }
}

<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('home');
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function home()
    {
        return view('home');
    }

    public function test()
    {

    }
}

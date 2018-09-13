<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Storage;

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

        $state = ['empty', 'not_empty'];
        $i = array_rand($state);
        echo $state[$i];

    }

}

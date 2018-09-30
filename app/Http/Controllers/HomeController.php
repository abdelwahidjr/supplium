<?php

namespace App\Http\Controllers;

use Spatie\Activitylog\Models\Activity;

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

        $latestActivities = Activity::with('user')->latest()->limit(10)->get();

        dd($latestActivities);
    }
}

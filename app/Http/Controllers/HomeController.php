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
        /*$start_date = '2018-09-02';
        $end_date   = '2018-09-30';
        $step      = 1;
        $unit      = 'D';

        $repeat_days  = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        $repeat_start = new DateTime($start_date);
        $repeat_end   = new DateTime($end_date);

        try {
            $interval = new DateInterval("P{$step}{$unit}");
        } catch (Exception $e) {
        }

        $period = new DatePeriod($repeat_start, $interval, $repeat_end);

        echo "<b>"."--------------------"."<br>";

        foreach ($period as $key => $date) {

            if (in_array($date->format('D'), $repeat_days)) {
                echo "<b>".($date->format('D'))."<br>";
                echo ($date->format('Y-m-d'))."<br>";
                echo "<b>"."--------------------"."<br>";
            }
        }*/



    }

}

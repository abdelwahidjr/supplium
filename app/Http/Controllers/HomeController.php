<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Notifications\OrderConfirmation;

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

        $order = Order::find('67');
        $users = $order->outlet->brand->company->user;

        foreach ($users as $user)
        {
            if ($user->setting->notifications == 'on')
            {
                $user->notify(new OrderConfirmation($order));

            }
        }


    }
}

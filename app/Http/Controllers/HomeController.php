<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Notifications\OrderConfirmation;
use App\Notifications\SupplierHaveOrder;
use Notification;

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

        //return view('mail.order.supplier_new_order');

        $user     = User::find('2');
        $order    = Order::find('50');
        $supplier = $order->supplier;

        Notification::send($user , (new OrderConfirmation($order)));
        Notification::send($supplier , (new SupplierHaveOrder()));

    }
}

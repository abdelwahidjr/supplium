<?php

namespace App\Console\Commands;

use App\Models\StandingOrder;
use DateTime;
use Illuminate\Console\Command;

class CheckStandingOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'standing-orders:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'check standing orders';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $today          = new DateTime('today');
        $today_date     = $today->format('Y-m-d');
        $today_week_day = $today->format('D');

        $standing_orders = StandingOrder::where([
            ['status', '=', 'active'],
            ['end_date', '<>', $today_date],
            ['repeated_days', 'like', '%'.$today_week_day.'%'],
        ])->get();

        foreach ($standing_orders as $standing_order) {

            foreach ($standing_order->order as $order) {

                if ($order->scheduled_on == null) {
                    $scheduled_on = [];
                    array_push($scheduled_on, $today_date);
                    $order->status       = "confirmed";
                    $order->scheduled_on = $scheduled_on;

                } else {
                    $scheduled_on = $order->scheduled_on;
                    array_push($scheduled_on, $today_date);
                    $order->status       = "confirmed";
                    $order->scheduled_on = $scheduled_on;
                }

                $order->save();
            }
        }


    }

}

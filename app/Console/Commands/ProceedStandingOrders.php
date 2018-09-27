<?php

namespace App\Console\Commands;

use App\Models\StandingOrder;
use DateTime;
use Illuminate\Console\Command;

class ProceedStandingOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'standing-orders:proceed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Proceed Active Standing Orders';

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
            ['status' , '=' , 'active'] ,
            ['end_date' , '>=' , $today_date] ,
            ['repeated_days' , 'like' , '%' . $today_week_day . '%'] ,
        ])->orderBy('start_date')->get();

        foreach ($standing_orders as $standing_order)
        {
            $start_date      = $standing_order->start_date;
            $repeated_period = $standing_order->repeated_period;

            $schedule_date = date('Y-m-d' , strtotime($start_date . '+' . $repeated_period));

            // if $repeated_period + $start_date == $today_date make a schedule
            print $schedule_date . "<br>";

            if ($schedule_date == $today_date)
            {

                foreach ($standing_order->order as $order)
                {
                    if ($order->scheduled_on == null)
                    {
                        $scheduled_on = [];
                        array_push($scheduled_on , $today_date);
                        $order->status       = "confirmed";
                        $order->scheduled_on = $scheduled_on;

                    } else
                    {
                        $scheduled_on = $order->scheduled_on;

                        // check scheduled once in a day
                        if ( ! in_array($today_date , $scheduled_on))
                        {
                            array_push($scheduled_on , $today_date);
                            $order->status       = "confirmed";
                            $order->scheduled_on = $scheduled_on;
                        }
                    }

                    $order->save();
                }
            }
        }

    }


}

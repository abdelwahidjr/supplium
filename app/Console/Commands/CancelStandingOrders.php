<?php

namespace App\Console\Commands;

use App\Models\StandingOrder;
use DateTime;
use Illuminate\Console\Command;

class CancelStandingOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'standing-orders:cancel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cancel Expired Standing Orders';

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
        $today      = new DateTime('today');
        $today_date = $today->format('Y-m-d');

        $standing_orders = StandingOrder::where([
            ['status' , '=' , 'active'] ,
            ['end_date' , '<' , $today_date] ,
        ])->get();

        foreach ($standing_orders as $standing_order)
        {
            $standing_order->status = 'expired';
            $standing_order->save();
        }
    }


}

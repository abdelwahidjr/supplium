<?php

namespace App\Console\Commands;

use App\Models\StandingOrder;
use App\Models\SupplierPayment;
use DateTime;
use Illuminate\Console\Command;

class ResetSupplierCreditLimit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'supplier-credit-limit:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset Supplier Credit Limit';

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

        $payments=SupplierPayment::where('payment_type','credit')->get();
        foreach ($payments as $payment)
        {
            $payment->remaining_limit=$payment->credit_limit;
            $payment->save();


        }

        //$this->info('Suppliers Credit were reset Successfully!');


    }


}

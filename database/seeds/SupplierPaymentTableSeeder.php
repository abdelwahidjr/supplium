<?php

use App\Models\SupplierPayment;
use Illuminate\Database\Seeder;

class  SupplierPaymentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (app()->environment() !== 'production' && App::runningInConsole())
        {
            foreach (range(1 , 50) as $index)
            {
                $current_date = date("Y-m-d");

                $payment_type = ['cash' , 'credit'];
                $payment_type = $payment_type[array_rand($payment_type)];

                $credit_period = [15 , 30 , 45 , 60 , 90];
                $credit_period = $credit_period[array_rand($credit_period)];

                $option = ['on' , 'off'];
                $option = $option[array_rand($option)];

                SupplierPayment::create([
                    'payment_type'     => $payment_type ,
                    'credit_limit'     => $payment_type == "cash" ? null : rand(10000 , 100000) ,
                    'remaining_limit'  => $payment_type == "cash" ? null : rand(10000 , 100000) ,
                    'credit_period'    => $payment_type == "cash" ? null : $credit_period ,
                    'period_renewal'   => $payment_type == "cash" ? null : $current_date ,
                    'payment_due_date' => $payment_type == "cash" ? null : rand(1 , 30) ,
                    'restrict'         => $option ,
                    'supplier_id'      => rand(1 , 50) ,
                ]);
            }
        }

    }

}

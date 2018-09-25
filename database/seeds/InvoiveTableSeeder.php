<?php

use App\Models\Invoice;
use App\Models\Order;
use Illuminate\Database\Seeder;

class  InvoiveTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (app()->environment() !== 'production' && App::runningInConsole()) {
            foreach (range(1, 50) as $index) {

                $order_id = rand(1, 50);
                $order    = Order::find($order_id);

                Invoice::create([
                    'amount'     => $order->total_price_after_tax,
                    'company_id' => $order->outlet->brand->company->id,
                    'order_id'   => $order_id,
                ]);
            }
        }

    }

}

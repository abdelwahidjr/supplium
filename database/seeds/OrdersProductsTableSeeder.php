<?php

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Database\Seeder;

class OrdersProductsTableSeeder extends Seeder
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
                OrderProduct::create([
                    'order_id'   => Order::all()->random()->id,
                    'product_id' => Product::all()->random()->id,
                ]);
            }
        }
    }

}

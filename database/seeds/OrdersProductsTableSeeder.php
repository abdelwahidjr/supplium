<?php

use App\Models\OrderProduct;
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

        if (app()->environment() !== 'production' && App::runningInConsole())
        {
            foreach (range(1 , 50) as $index)
            {
                OrderProduct::create([
                    'order_id'   => rand(1 , 50) ,
                    'product_id' => rand(1 , 50) ,
                ]);
            }
        }
    }

}

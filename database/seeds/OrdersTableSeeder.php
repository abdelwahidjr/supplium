<?php

use App\Models\Order;
use Faker\Factory;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order = new Order;

        $faker = Factory::create();

        if (app()->environment() !== 'production' && App::runningInConsole())
        {
            foreach (range(1 , 50) as $index)
            {

                $tax          = number_format(rand(10 , 50) , 2 , "." , "");
                $rand_decimal = number_format(rand(10 , 1000) , 2 , "." , "");

                $status = ['pending' , 'confirmed'];
                $status = $status[array_rand($status)];

                $price       = $rand_decimal;
                $tax_rate    = $tax;
                $tax_val     = $price * $tax_rate / 100;
                $total_price = (double) $price + $tax_val;
                //$calculatedTaxRate = (($total_price - $price) / $price) * 100;      // = $tax_rate

                $products = [];
                foreach (range(1 , 4) as $i)
                {
                    $products[$i] = rand(1 , 50);
                }
                $today      = new DateTime('today');
                $today_date = $today->format('Y-m-d');

                Order::create([
                    'number'                 => $today_date . $index ,
                    'products'               => json_encode($products) ,
                    'scheduled_on'           => null ,
                    'status'                 => $status ,
                    'delivery_status'        => "not_delivered" ,
                    'tax'                    => $tax_rate ,
                    'tax_val'                => $tax_val ,
                    'total_price_before_tax' => $price ,
                    'total_price_after_tax'  => $total_price ,
                    'total_qty'              => rand(1 , 50) ,
                    'notes'                  => $faker->sentence($nbWords = 5) ,
                    'supplier_id'            => rand(1 , 50) ,
                    'outlet_id'              => rand(1 , 50) ,
                    'standing_order_id'      => rand(1 , 50) ,
                ]);
            }
        }
    }

}

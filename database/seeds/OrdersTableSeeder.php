<?php

use App\Models\Order;
use App\Models\Outlet;
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

        $faker = Factory::create();

        if (app()->environment() !== 'production' && App::runningInConsole()) {
            foreach (range(1, 100) as $index) {

                $tax          = number_format(rand(10, 50), 2, ".", "");
                $rand_integer = rand(1, 100);
                $rand_decimal = number_format(rand(10, 1000), 2, ".", "");

                $status = ['pending', 'confirmed', 'fully delivered', 'fully delivered + bounce', 'partially delivered', 'not deliverd'];
                $i      = array_rand($status);
                $status = $status[$i];

                $price       = $rand_decimal;
                $tax_rate    = $tax;
                $tax_val     = $price * $tax_rate / 100;
                $total_price = (double)$price + $tax_val;
                //$calculatedTaxRate = (($total_price - $price) / $price) * 100;      // = $tax_rate

                Order::create([
                    'products'               => [rand(1, 50), rand(1, 50), rand(1, 50)],
                    'status'                 => $status,
                    'tax'                    => $tax_rate,
                    'tax_val'                => $tax_val,
                    'total_price_before_tax' => $price,
                    'total_price_after_tax'  => $total_price,
                    'total_qty'              => $rand_integer,
                    'notes'                  => $faker->sentence($nbWords = 5),
                    'outlet_id'              => Outlet::all()->random()->id,
                ]);
            }
        }
    }

}

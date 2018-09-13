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

        $faker = Factory::create();

        $rand = number_format(rand(10, 1000), 2, ".", "");

        if (app()->environment() !== 'production' && App::runningInConsole()) {
            foreach (range(1, 100) as $index) {
                Order::create([
                    'products'  => $faker->sentence($nbWords = 5),
                    'outlet_id' => rand(1, 50),
                ]);
            }
        }
    }

}

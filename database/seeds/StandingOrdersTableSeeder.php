<?php

use App\Models\Order;
use App\Models\StandingOrder;
use Faker\Factory;
use Illuminate\Database\Seeder;

class StandingOrdersTableSeeder extends Seeder
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
            foreach (range(1, 50) as $index) {

                $repeat_days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
                $rand_day1   = $repeat_days[array_rand($repeat_days)];
                $rand_day2   = $repeat_days[array_rand($repeat_days)];
                $rand_day3   = $repeat_days[array_rand($repeat_days)];
                $days        = [];

                if ( ! in_array($rand_day1, $days, true)) {
                    $days[0] = $rand_day1;
                }
                if ( ! in_array($rand_day2, $days, true)) {
                    $days[1] = $rand_day2;
                }
                if ( ! in_array($rand_day3, $days, true)) {
                    $days[2] = $rand_day3;
                }

                StandingOrder::create([
                    'name'          => $faker->name,
                    'start_date'    => $faker->date('Y-m-d'),
                    'end_date'      => $faker->date('Y-m-d'),
                    'repeated_days' => $days,
                    'order_id'      => Order::all()->random()->id,
                ]);
            }
        }
    }

}

<?php

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
                $rand_day4   = $repeat_days[array_rand($repeat_days)];

                StandingOrder::create([
                    'name'          => $faker->word,
                    'start_date'    => $faker->date('Y-m-d', $max = 'now'),
                    'end_date'      => $faker->date('Y-m-d', $max = 'now'),
                    'repeated_days' => [$rand_day1, $rand_day2, $rand_day3, $rand_day4],
                ]);
            }
        }
    }

}

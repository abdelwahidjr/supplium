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

                $status = ['active', 'expired'];
                $rand_i = array_rand($status);
                $status = $status[$rand_i];

                StandingOrder::create([
                    'name'          => $faker->word,
                    'status'        => $status,
                    'start_date'    => $faker->dateTimeInInterval($startDate = 'now', $interval = '+ '.rand(1, 50).' days'),
                    'end_date'      => $faker->dateTimeInInterval($startDate = 'now', $interval = '+ '.rand(100, 200).' days'),
                    'repeated_days' => [$rand_day1, $rand_day2, $rand_day3, $rand_day4],
                ]);
            }
        }
    }

}

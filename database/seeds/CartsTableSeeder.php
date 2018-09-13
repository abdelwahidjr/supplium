<?php

use App\Models\Cart;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $state = ['empty', 'not_empty'];
        $i = array_rand($state);
        $status = $state[$i];

        $faker = Factory::create();

        if (app()->environment() !== 'production' && App::runningInConsole()) {
            foreach (range(1, 50) as $index) {
                cart::create([
                    'status'    => $status,
                    'notes'     => $faker->sentence($nbWords = 5),
                    'orders'    => $faker->sentence($nbWords = 5),
                    'outlet_id' => rand(1, 50),
                ]);
            }
        }
    }

}

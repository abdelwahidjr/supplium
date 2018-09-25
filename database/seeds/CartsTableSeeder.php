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
        $faker = Factory::create();

        if (app()->environment() !== 'production' && App::runningInConsole()) {
            foreach (range(1, 50) as $index) {

                $status = ['empty', 'not_empty'];
                $status = $status[array_rand($status)];

                cart::create([
                    'products'  => [rand(1, 50), rand(1, 50), rand(1, 50)],
                    'status'    => $status,
                    'notes'     => $faker->sentence($nbWords = 5),
                    'outlet_id' => rand(1, 50),
                ]);
            }
        }
    }

}

<?php

use App\Models\Ad;
use Faker\Factory;
use Illuminate\Database\Seeder;

class AdsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        if (app()->environment() !== 'production' && App::runningInConsole())
        {
            foreach (range(1 , 50) as $index)
            {
                Ad::create([
                    'name'        => $faker->name ,
                    'description' => $faker->sentence($nbWords = 5) ,
                    'url'         => asset('images/placeholder.png') ,
                ]);
            }
        }
    }

}

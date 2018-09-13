<?php

use App\Models\Company;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ComapiesTableSeeder extends Seeder
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
                Company::create([
                    'name'              => $faker->company,
                    'business_type'     => $faker->word,
                    'phone'             => $faker->phoneNumber,
                    'address_1'         => $faker->address,
                    'address_2'         => $faker->address,
                    'website'           => $faker->word.'.test',
                    'country'           => $faker->country,
                    'city'              => $faker->city,
                    'zip'               => $faker->postcode,
                    'extra_information' => $faker->sentence($nbWords = 5),
                ]);
            }
        }
    }

}

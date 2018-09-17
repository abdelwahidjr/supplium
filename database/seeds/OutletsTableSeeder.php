<?php

use App\Models\Brand;
use App\Models\Outlet;
use Faker\Factory;
use Illuminate\Database\Seeder;

class OutletsTableSeeder extends Seeder
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
                Outlet::create([
                    'name'             => $faker->name,
                    'phone'            => $faker->phoneNumber,
                    'address'          => $faker->address,
                    'city'             => $faker->city,
                    'longitude'        => $faker->longitude,
                    'latitude'         => $faker->latitude,
                    'shipping_address' => $faker->address,
                    'brand_id'         => Brand::all()->random()->id,
                ]);
            }
        }
    }
}

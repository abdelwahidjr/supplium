<?php

use App\Models\Brand;
use App\Models\Company;
use Faker\Factory;
use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
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
                Brand::create([
                    'name'        => $faker->name,
                    'description' => $faker->sentence,
                    'company_id'  => Company::all()->random()->id,
                ]);
            }
        }
    }

}

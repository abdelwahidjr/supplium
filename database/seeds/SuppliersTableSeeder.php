<?php

use App\Models\Category;
use App\Models\Company;
use App\Models\Supplier;
use Faker\Factory;
use Illuminate\Database\Seeder;

class  SuppliersTableSeeder extends Seeder
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


                $option = ['on', 'off'];
                $option = $option[array_rand($option)];

                Supplier::create([
                    'name'             => $faker->company,
                    'email'            => $faker->email,
                    'phone'            => $faker->phoneNumber,
                    'address'          => $faker->address,
                    'directory_option' => $option,
                    'category_id'      => Category::all()->random()->id,
                    'company_id'       => Company::all()->random()->id,
                ]);
            }
        }

    }

}

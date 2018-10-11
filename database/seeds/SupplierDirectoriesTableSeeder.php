<?php

use App\Models\SupplierDirectory;
use Illuminate\Database\Seeder;
use Faker\Factory;

class SupplierDirectoriesTableSeeder extends Seeder
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

                SupplierDirectory::create([
                    'segment'     => $faker->name ,
                    'name'     => $faker->name ,
                    'logo'     => $faker->imageUrl(640,480) ,
                    'contact_person'     => $faker->name ,
                    'position'     => $faker->city ,
                    'phone_number'     => $faker->phoneNumber ,
                    'mobile_number'     => $faker->phoneNumber ,
                    'email'     => $faker->companyEmail ,
                    'website'     => $faker->url ,
                    'address'     => $faker->address ,
                    'operation_areas'     => $faker->city ,
                ]);
            }
        }
    }
}

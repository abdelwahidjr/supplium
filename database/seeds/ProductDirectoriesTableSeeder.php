<?php

use App\Models\ProductDirectory;
use Illuminate\Database\Seeder;
use Faker\Factory;

class ProductDirectoriesTableSeeder extends Seeder
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


                $units =  ['GM' , 'KG'];
                $unit  = $units[array_rand($units)];
                $units_of_sale =  ['GM' , 'CRT'];
                $units_of_sale  = $units_of_sale[array_rand($units_of_sale)];

                ProductDirectory::create([
                    'segment'     => $faker->name ,
                    'category'     => $faker->name ,
                    'sub_category'     => $faker->name ,
                    'supplier'     => $faker->name ,
                    'brand'     => $faker->name ,
                    'sku'              => $faker->ean8 ,
                    'describtion'     => $faker->text ,
                    'type'     => $faker->name ,
                    'quantity'     => $faker->numberBetween(1,100) ,
                    'unit_price'     => $faker->numberBetween(100,10000) ,
                    'weight'     => $faker->numberBetween(100,5000) ,
                    'unit'     => $unit ,
                    'case_price'     => $faker->numberBetween(100,10000) ,
                    'origin'     => $faker->country ,
                    'unit_of_sale'     => $units_of_sale ,



                ]);
            }
        }
    }
}

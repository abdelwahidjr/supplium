<?php

use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
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

                $rand_decimal = (double) number_format(rand(10 , 1000) , 2 , "." , "");

                $units = ['kg' , 'liter' , 'packet' , 'bucket' , 'case' , 'piece' , 'box' , 'gallon'];
                $unit  = $units[array_rand($units)];

                $option = ['on' , 'off'];
                $option = $option[array_rand($option)];

                Product::create([
                    'name'             => $faker->name ,
                    'sku'              => $faker->ean8 ,
                    'unit'             => $unit ,
                    'price'            => $rand_decimal ,
                    'supplier_id'      => rand(1 , 50) ,
                    'category_id'      => rand(1 , 50) ,
                    'cart_id'          => rand(1 , 50) ,
                ]);
            }
        }

    }
}

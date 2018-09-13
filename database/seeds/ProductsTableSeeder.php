<?php

use App\Models\Product;
use Illuminate\Database\Seeder;
use Faker\Factory;

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

        $rand = number_format(rand(10, 1000), 2, ".", "");

        if (app()->environment() !== 'production' && App::runningInConsole()) {
            foreach (range(1, 100) as $index) {
                Product::create([
                    'name'        => $faker->name,
                    'sku'         => $faker->ean8,
                    'unit'        => $faker->word,
                    'price'       => $rand,
                    'supplier_id' => rand(1, 50),
                    'category_id' => rand(1, 50),
                ]);
            }
        }

    }
}

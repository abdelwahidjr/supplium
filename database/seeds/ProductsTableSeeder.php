<?php

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
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

        if (app()->environment() !== 'production' && App::runningInConsole()) {
            foreach (range(1, 100) as $index) {

                $rand_decimal = (double)number_format(rand(10, 1000), 2, ".", "");

                $units = ['kg', 'liter', 'packet', 'bucket', 'case', 'piece', 'box', 'gallon'];
                $i     = array_rand($units);
                $unit  = $units[$i];

                Product::create([
                    'name'        => $faker->name,
                    'sku'         => $faker->ean8,
                    'unit'        => $unit,
                    'price'       => $rand_decimal,
                    'supplier_id' => Supplier::all()->random()->id,
                    'category_id' => Category::all()->random()->id,
                ]);
            }
        }

    }
}

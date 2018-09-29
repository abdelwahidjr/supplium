<?php

use App\Models\CartProduct;
use Illuminate\Database\Seeder;

class CartsProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (app()->environment() !== 'production' && App::runningInConsole())
        {
            foreach (range(1 , 50) as $index)
            {
                CartProduct::create([
                    'cart_id'    => rand(1 , 50) ,
                    'product_id' => rand(1 , 50) ,
                ]);
            }
        }
    }

}

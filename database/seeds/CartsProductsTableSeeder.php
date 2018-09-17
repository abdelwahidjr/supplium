<?php

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Product;
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
        if (app()->environment() !== 'production' && App::runningInConsole()) {
            foreach (range(1, 50) as $index) {
                CartProduct::create([
                    'cart_id'    => Cart::all()->random()->id,
                    'product_id' => Product::all()->random()->id,
                ]);
            }
        }
    }

}

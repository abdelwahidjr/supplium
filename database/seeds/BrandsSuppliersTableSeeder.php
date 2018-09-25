<?php

use App\Models\BrandSupplier;
use Illuminate\Database\Seeder;

class BrandsSuppliersTableSeeder extends Seeder
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
                BrandSupplier::create([
                    'brand_id'    => rand(1, 50),
                    'supplier_id' => rand(1, 50),
                ]);
            }
        }
    }

}

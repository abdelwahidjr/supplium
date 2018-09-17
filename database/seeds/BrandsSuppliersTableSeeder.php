<?php

use App\Models\Brand;
use App\Models\BrandSupplier;
use App\Models\Supplier;
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
                    'brand_id'    => Brand::all()->random()->id,
                    'supplier_id' => Supplier::all()->random()->id,
                ]);
            }
        }
    }

}

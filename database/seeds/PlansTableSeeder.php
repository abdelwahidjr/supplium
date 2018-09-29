<?php

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $name        = [
            'Basic' ,
            'Professional' ,
            'Enterprise' ,
        ];
        $brand_free  = [
            '0' ,
            '0' ,
            '0' ,
        ];
        $brand_max   = [
            '1' ,
            '3' ,
            'unlimited' ,
        ];
        $outlet_free = [
            '0' ,
            '3' ,
            '0' ,
        ];
        $outlet_max  = [
            '1' ,
            '10' ,
            'unlimited' ,
        ];

        if (app()->environment() !== 'production' && App::runningInConsole())
        {

            foreach (range(1 , 3) as $i)
            {
                Plan::create([
                    'name'        => $name[$i - 1] ,
                    'brand_free'  => $brand_free[$i - 1] ,
                    'brand_max'   => $brand_max[$i - 1] ,
                    'outlet_free' => $outlet_free[$i - 1] ,
                    'outlet_max'  => $outlet_max[$i - 1] ,
                ]);
            }
        }
    }

}

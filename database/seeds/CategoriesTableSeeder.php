<?php

use App\Models\Category;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
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
                Category::create([
                    'name' => $faker->name ,
                    'image_url' => 'storage/images/ads/2018-10-07-07-35-46_6aef23e637348db1003df5011a9075bafbafe7eb.jpg' ,

                ]);
            }
        }

    }

}

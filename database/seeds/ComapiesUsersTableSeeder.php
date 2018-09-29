<?php

use App\Models\CompanyUser;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ComapiesUsersTableSeeder extends Seeder
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
                CompanyUser::create([
                    'user_id'    => rand(1 , 50) ,
                    'company_id' => rand(1 , 50) ,
                ]);
            }
        }
    }

}

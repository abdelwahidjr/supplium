<?php

use App\Models\Company;
use App\Models\CompanyUser;
use App\Models\User;
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

        if (app()->environment() !== 'production' && App::runningInConsole()) {
            foreach (range(1, 50) as $index) {
                CompanyUser::create([
                    'user_id'    => User::all()->random()->id,
                    'company_id' => Company::all()->random()->id,
                ]);
            }
        }
    }

}

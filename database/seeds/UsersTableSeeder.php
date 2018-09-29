<?php

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->systemUsersSeeding();

        $faker = Factory::create();

        if (app()->environment() !== 'production' && App::runningInConsole())
        {
            foreach (range(1 , 50) as $index)
            {
                User::create([
                    'name'     => $faker->name ,
                    'email'    => $faker->email ,
                    'password' => Hash::make('secret') ,
                ]);
            }
        }
    }

    public function systemUsersSeeding()
    {
        $users  = [
            'abdelwahid' ,
        ];
        $emails = [
            'm.abdelwahid@madad.sa' ,
        ];

        foreach (range(0 , 0) as $i)
        {
            User::create([
                'name'     => $users[$i] ,
                'email'    => $emails[$i] ,
                'password' => Hash::make('00001111') ,
            ]);
        }
    }
}

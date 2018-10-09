<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $state        = ['on' , 'off'];
        // $notification = $state[array_rand($state)];

        if (app()->environment() !== 'production' && App::runningInConsole())
        {
            foreach (range(1 , 50) as $index)
            {
                Setting::create([
                    'notifications' => 'on' ,
                    'user_id'       => rand(1 , 50) ,
                ]);
            }
        }
    }

}

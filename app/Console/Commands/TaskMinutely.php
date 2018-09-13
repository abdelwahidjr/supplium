<?php

namespace App\Console\Commands;

use App\Models\User;
use Faker\Factory;
use Hash;
use Illuminate\Console\Command;

class TaskMinutely extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Task Start Description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $faker = Factory::create();

        foreach (range(1, 5) as $index) {
            User::create([
                'name'     => $faker->name,
                'email'    => $faker->email,
                'password' => Hash::make('secret'),
            ]);
        }
    }

}

<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands
        = [
            'App\Console\Commands\Install',
            'App\Console\Commands\TaskMinutely',
        ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     *
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        /*

        in server run "crontab -e" and add : * * * * * cd /project-path && php artisan schedule:run 1 >> /dev/null 2>&1

        * * * * * cd /var/www/ && php artisan schedule:run 1 >> /dev/null 2>&1

        */

        // $schedule->command('inspire')->hourly();

        // $schedule->command('task:start')->everyMinute();

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

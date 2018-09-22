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
            'App\Console\Commands\CheckStandingOrders',
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

        laradock out of the box comes with crontab  pre-installed

        if your are using crontab

        in server run "crontab -e" and add :

        * * * * * cd /var/www/ && php artisan schedule:run >> /dev/null 2>&1

        */

        $schedule->command('standing-orders:check')->everyMinute();
        // $schedule->command('standing-orders:check')->->dailyAt('24:00');

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

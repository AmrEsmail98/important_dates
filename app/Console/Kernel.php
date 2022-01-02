<?php

namespace App\Console;

use App\Services\ReminderNotificationsService;
use App\Services\RemindersHandlerService;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function (RemindersHandlerService $reminderHandler, ReminderNotificationsService $reminderNotificationsHandler) {
            $reminderHandler->handle();
            $reminderNotificationsHandler->notify();
        })->daily();
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

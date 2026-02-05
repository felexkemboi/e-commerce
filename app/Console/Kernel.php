<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\LowStockCheckCommand;
use App\Console\Commands\DailySalesReportCommand;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        LowStockCheckCommand::class,
        DailySalesReportCommand::class
    ];
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('report:stock')->dailyAt('04:00');
        $schedule->command('report:sales')->dailyAt('23:00');
    }


    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}

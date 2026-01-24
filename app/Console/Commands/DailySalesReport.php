<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DailySalesReport extends Command
{
    protected $signature = 'report:sales';

    protected $description = 'Send daily sales report to admin';

    public function handle()
    {
        $this->info('Daily sales report command executed successfully.');
        return Command::SUCCESS;
    }
}

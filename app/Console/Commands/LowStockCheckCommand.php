<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\LowStockMail;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;

class LowStockCheckCommand extends Command
{
    protected $signature = 'report:stock';

    protected $description = 'Send emails for products that are low in stock';

    public function handle()
    {
        $products = Product::where('stock_quantity', '<=', 20)->get();

        Mail::to(config('mail.low_stock_emails'))->queue(new LowStockMail($products));

        $this->info('All low-stock emails have been queued.');
    }
}

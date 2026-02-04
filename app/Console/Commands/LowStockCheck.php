<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\LowStockMail;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;

class LowStockCheck extends Command
{
    protected $signature = 'report:sales';

    protected $description = 'Send emails for products that are low in stock';

    public function handle()
    {
        $lowStockProducts = Product::where('stock_quantity', '<=', 20)->get();

        foreach ($lowStockProducts as $product) {
            Mail::to(config('mail.low_stock_emails'))->queue(new LowStockMail($product));
            $this->info("Queued email for product: {$product->name}");
        }

        $this->info('All low-stock emails have been queued.');
    }
}

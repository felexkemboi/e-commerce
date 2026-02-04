<?php

namespace App\Jobs;

use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\LowStockMail;
use App\Models\Product;

class LowStockNotification implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(public Product $product)
    {
    }

    public function handle()
    {
        $emails = explode(',', config('mail.low_stock_emails'));

        Mail::to($emails)->send(new LowStockMail($this->product));
    }
}

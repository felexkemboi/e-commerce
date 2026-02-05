<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\DailySalesReportMail;
use App\Models\CartItem;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class DailySalesReportCommand extends Command
{
    protected $signature = 'report:sales';

    protected $description = 'Generate and send daily sales report';

    public function handle()
    {

        $user = User::where('email', 'admin@ecommerce.com')->first();

        if (!$user) {
            $this->error('Admin user not found');
            return;
        }

        $cartItems = CartItem::with('product')
                ->where('user_id', $user->id)
                ->get();

        $products = $cartItems->map(fn($item) => $item->product);

        $products = $products->unique('id')->values();

        Mail::to(config('mail.daily_sales_report'))->queue(new DailySalesReportMail($products));

        $this->info("Queued email for Sales Report");
    }
}

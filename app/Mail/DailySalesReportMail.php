<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DailySalesReportMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public $products;

    /**
     * Create a new message instance.
     */
    public function __construct($products)
    {
        $this->products = $products;
    }

    public function build()
    {
        return $this->subject('Daily Sales Report')
            ->from('admin@ecommerce.com', 'Ecommerce Platform')
            ->view('emails.sales_report')
            ->with([
                'products' => $this->products,
            ]);
    }
}

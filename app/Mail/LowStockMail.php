<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LowStockMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public $products)
    {
        $this->products = $products;
    }

    public function build()
    {
        return $this->subject('Low Stock Alert')
            ->from('admin@ecommerce.com', 'Ecommerce Platform')
            ->view('emails.low_stock')
            ->with([
                'products' => $this->products,
            ]);
    }
}

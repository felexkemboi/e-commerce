<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LowStockMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function __construct(public $product)
    {
    }
    public function build()
    {
        return $this->subject('Low Stock Alert')
            ->from('admin@ecommerce.com', 'Ecommerce Platform')
            ->view('emails.low-stock')
            ->with([
                'product' => $this->product,
            ]);
    }
}

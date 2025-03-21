<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderCompletedAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $carts;

    public function __construct($user, $carts)
    {
        $this->user = $user;
        $this->carts = $carts;
    }

    public function build()
    {
        return $this->subject('New Order Completed')
                    ->view('emails.order_completed_admin') // Use admin's view
                    ->with([
                        'user' => $this->user,
                        'carts' => $this->carts,
                    ]);
    }
}


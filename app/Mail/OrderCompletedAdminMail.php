<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;

class OrderCompletedAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mailData;
    public function __construct($mailData)
    {
        $this->mailData = $mailData;
    }

    public function build()
    {
        return $this->subject("新規購入がありました（{$this->mailData['paymentType']}）")
                    ->view('emails.empty') ;// Use admin's view
                    // ->with([
                    //     'user' => $this->user,
                    //     'carts' => $this->carts,
                    //     'address' => $this->address
                    // ]);
    }

    public function attachments(): array
    {
        return [
            Attachment::fromData(fn () => $this->mailData['ocapdf']->output(), "{$this->mailData['paymentType']}.pdf")
            ->withMime('application/pdf'),
        ];
    }
}


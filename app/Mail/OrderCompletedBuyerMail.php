<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;

class OrderCompletedBuyerMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mailData;

    public function __construct($mailData)
    {
        $this->mailData = $mailData;
    }

    public function build()
    {
        return $this->subject('注文完了')
                    ->view('emails.empty'); // Use buyer's view
                    // ->with([
                    //     'user' => $this->user,
                    //     'carts' => $this->carts,
                    // ]);
    }

    public function attachments(): array
    {
        return [
            Attachment::fromData(fn () => $this->mailData['ocbpdf']->output(), '注文完了.pdf')
            ->withMime('application/pdf'),
        ];
    }
}

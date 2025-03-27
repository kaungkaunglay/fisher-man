<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CashOnDeliveryMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    // public $address;
    // public $carts;
    public $mailData;
    
    public function __construct($mailData)
    {
        // logger($mailData);
        $this->mailData = $mailData;
       
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Cash On Delivery Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        // logger($this->mailData);
        return new Content(
            view: 'emails.empty',
        );
        
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromData(fn () => $this->mailData['codpdf']->output(), 'cash_on_delivery.pdf')
            ->withMime('application/pdf'),
        ];
    }
}

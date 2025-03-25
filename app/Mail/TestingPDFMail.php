<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TestingPDFMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pdf;

    /**
     * Create a new message instance.
     */
    public function __construct()
    {
        //
        
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        
        return new Envelope(
            subject: 'Testing P D F Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $this->pdf = Pdf::loadView('emails.testingpdfmail');

        return new Content(
            view: 'emails.testingpdfmail',

        )->attach(Attachment::);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DataCrawReport extends Mailable
{
    use Queueable, SerializesModels;

    public $stats;

    /**
     * Create a new message instance.
     */
    public function __construct(array $stats)
    {
        $this->stats = $stats;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->to('zwehtetnaing@andfun.biz')
                    ->subject('データ取得および保存レポート - ' . now()->toDateString())
                    ->view('emails.data_craw_report')
                    ->with(['stats' => $this->stats]);
    }
}
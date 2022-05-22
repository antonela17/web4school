<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailWithAttachment extends Mailable
{
    use Queueable, SerializesModels;

    protected $filename;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($filename)
    {
        $this->filename=$filename;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to('test@example.com')
            ->attachFromStorage('files/'.$this->filename)
            ->markdown('emails.mailAttachment');
    }
}

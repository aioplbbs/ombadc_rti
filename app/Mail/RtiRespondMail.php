<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RtiRespondMail extends Mailable
{
    use Queueable, SerializesModels;

    public $respond;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($respond)
    {
        $this->respond = $respond;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->subject($this->respond->subject)->view('emails.rti-response');
        if(!empty($this->respond->attachments)){
            foreach ($this->respond->attachments as $key => $value) {
                $email->attach(storage_path('app/' . $value));
            }
        }
        return $email;
    }
}

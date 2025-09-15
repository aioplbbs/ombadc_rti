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
        if ($this->respond->relationLoaded('media') || $this->respond->media()->exists()) {
            foreach ($this->respond->getMedia('mail_attachment') as $media) {
                $email->attachData(file_get_contents($media->getUrl()), $media->file_name, [
                    'mime' => $media->mime_type,
                ]);
            }
        }
        return $email;
    }
}

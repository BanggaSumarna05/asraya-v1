<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailVisit extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }
    public function build()
    {

        return $this->view('formatEmail')
            ->from(env('MAIL_USERNAME'))
            // ->cc($address, $name)
            // ->bcc($address, $name)
            // ->replyTo($address, $name)
            ->subject($this->data['fullname'] . ' - Schedule Visit')
            ->with(['data' => $this->data]);
    }
}

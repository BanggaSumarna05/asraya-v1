<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailVisitClient extends Mailable
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

        return $this->view('formatEmailClient')
            ->from(env('MAIL_USERNAME'))
            ->subject('PT. Casa Asraya Property - Schedule Visit Confirmation')
            ->with(['data' => $this->data]);
    }
}

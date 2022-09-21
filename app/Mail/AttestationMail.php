<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AttestationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pdf;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pdf)
    {
        $this->pdf= $pdf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Votre attestation du BEPC')->view('emails.attestation');
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\App;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    public $demande;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Array $demande)
    {
        $this->demande = $demande;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $pdf = App::make('dompdf.wrapper');

        $pdf = $pdf ->loadView('emails.attestation', compact('demande'));
             
        return $this->view('emails.attestation')
        ->attachData($pdf, 'name.pdf', [
            'mime' => 'application/pdf',
        ]);
    }
}

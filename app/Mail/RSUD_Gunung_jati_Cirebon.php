<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RSUD_Gunung_jati_Cirebon extends Mailable
{
    use Queueable, SerializesModels;
    // use Queueable, SerializesModels;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('maillabirin@gmail.com')
            ->subject('UD CIPTA INDAH - Ferivikasi email')
            ->view('registermail');
    }
}

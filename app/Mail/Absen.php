<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Absen extends Mailable
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
        $tanggal = date('d-m-Y');

        return $this->from(['address' => 'cknk62@gmail.com', 'name' => 'Absen SMK BC'])
            ->subject('Absensi Harian SMK BC Tanggal: ' . $tanggal)
            ->view('email.absen');
    }
}

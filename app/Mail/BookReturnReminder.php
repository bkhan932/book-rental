<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookReturnReminder extends Mailable
{
    use Queueable, SerializesModels;

    protected $rental;

    public function __construct($rental)
    {
        $this->rental = $rental;
    }

    public function build()
    {
        return $this->view('emails.book-return-reminder')->with(['rental' => $this->rental]);
    }
}

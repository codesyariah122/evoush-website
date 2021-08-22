<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EventEmail extends Mailable
{
     use Queueable, SerializesModels;
   
    public $details;
   
    public function __construct($details)
    {
        $this->details = $details;
    }
   
    public function build()
    {
        $context = [
            'title' => 'Email List',
            'brand' => 'evoush'
        ];
        // return $this->subject('Event Anniversary Evoush 2021')
        //             ->view('dashboard.emails.eventEmail', $context);
        return $this->subject('Event Anniversary Evoush 2021')
                ->view('dashboard.emails.eventEmail')
                ->with('details', $this->details);

        // return $this->markdown('dashboard.emails.eventEmail')
        //       ->with('details', $this->details);
    }
}

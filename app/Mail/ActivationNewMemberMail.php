<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ActivationNewMemberMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }
   
    public function build()
    {
       
        // return $this->subject('Event Anniversary Evoush 2021')
        //             ->view('dashboard.emails.eventEmail', $context);
        return $this->subject('You Have New Member Join, Please Activation Here')
                ->view('dashboard.emails.SendActivationEmail')
                ->with('details', $this->details);

        // return $this->markdown('dashboard.emails.eventEmail')
        //       ->with('details', $this->details);
    }
}

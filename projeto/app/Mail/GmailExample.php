<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class GmailExample extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $contact;
    public function __construct($contact)
    {
        //
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
      //  dd($this->user);

 
        $this->from('biomedsearchipleiria@gmail.com', 'BioMed Search')
            ->subject('Message Confirmation')
            ->markdown('mails.example')
            ->with([
                'name' => $this->contact->name,
                'email' => $this->contact->email,
                'message' => $this->contact->message,

            ]);

            return redirect('/');
      
    }
}

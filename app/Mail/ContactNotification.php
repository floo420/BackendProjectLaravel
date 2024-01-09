<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $name;
    public $email;

    /**
     * Create a new message instance.
     *
     * @param array $data Data from the contact form
     */
    public function __construct($data, $name, $email)
{
    $this->data = $data;
    $this->name = $name;
    $this->email = $email;
}

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
{
    return $this->from($this->email, $this->name)
        ->subject($this->data['subject']) // Set the email subject
        ->view('emails') // Use the 'emails.contact' Blade template
        ->with(['data' => $this->data]); // Pass the data to the email template
}

}   
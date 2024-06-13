<?php 
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    public function __construct($details)
    {
        $this->details = $details;
    }

    public function build()
    {
        // Ensure the email format and domain match your email policies
        $fromAddress = filter_var($this->details['email'], FILTER_VALIDATE_EMAIL) ? $this->details['email'] : config('mail.from.address');
        
        return $this->from($fromAddress, $this->details['name'])  // User's email as "From" address
                    ->to('su94-adcsm-f22-029@superior.edu.pk')          // Your Gmail address
                    ->replyTo($this->details['email'], $this->details['name'])  // Reply-To header
                    ->subject('Contact Form Submission')
                    ->view('emails.contact');
    }
}

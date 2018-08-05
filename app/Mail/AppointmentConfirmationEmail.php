<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AppointmentConfirmationEmail extends Mailable
{
    use Queueable, SerializesModels;
    // public $user;
    public $appointment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\App\Appointment $appointment)
    {
        // $this->user = $user;
        $this->appointment = $appointment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->appointment->clinic->email)
            ->markdown('mails.en.appointment_confirmation')->with('appointment', $this->appointment);
    }
}

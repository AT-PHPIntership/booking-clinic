<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterClinic extends Mailable
{
    use Queueable, SerializesModels;

    public $clinic;

    /**
     * Create a new message instance.
     *
     * @param \App\Clinic $clinic clinic
     *
     * @return void
     */
    public function __construct(\App\Clinic $clinic)
    {
        $this->clinic = $clinic;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = [
            'clinic_id' => $this->clinic->id
        ];
        $query = http_build_query($data);
        $this->clinic->query = encrypt($query);

        return $this->view('mails.' . \App::getLocale() . '.register_clinic');
    }
}

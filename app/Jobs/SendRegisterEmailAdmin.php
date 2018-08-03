<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use App\Clinic;
use App\Mail\RegisterClinic;

class SendRegisterEmailAdmin implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $clinic;

    /**
     * Create a new job instance.
     *
     * @param \App\Clinic $clinic clinic
     *
     * @return void
     */
    public function __construct(Clinic $clinic)
    {
        $this->clinic = $clinic;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new RegisterClinic($this->clinic);
        Mail::to($this->clinic)->send($email);
    }
}

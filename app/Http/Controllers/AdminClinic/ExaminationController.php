<?php

namespace App\Http\Controllers\AdminClinic;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminClinic\BaseController;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentConfirmationEmail;
use App\Appointment;

class ExaminationController extends BaseController
{
    /**
     * Store a examination of clinic
     *
     * @param \Illuminate\Http\Requests $request     request
     * @param String                    $slug        slug
     * @param \App\Appointment          $appointment appointment
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $slug)
    {
        $appointment = Appointment::findOrFail($request->appointmentId);
        if ($this->clinic->id == $appointment->clinic->id and $appointment->isStatus('Confirmed')) {
                $data = $request->all();
                $data['appointment_id'] = $appointment->id;
                \App\Examination::create($data);
                $appointment->update(['status' => Appointment::STATUS['Completed']]);
                $mesage = (new AppointmentConfirmationEmail($appointment))
                    ->onQueue('emails');
                Mail::to($appointment->user->email)
                    ->queue($mesage);
                return response()->json( \App\Examination::latest()->first(), 200);
        }
        unset($slug);
        return response()->json(400);

    }
}

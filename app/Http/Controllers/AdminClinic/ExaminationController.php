<?php

namespace App\Http\Controllers\AdminClinic;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\AdminClinic\BaseController;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentConfirmationEmail;
use App\Appointment;

class ExaminationController extends BaseController
{
    /**
     * Store a examination of clinic
     *
     * @param \Illuminate\Http\Requests $request request
     * @param String                    $slug    slug
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $slug)
    {
        $appointment = Appointment::findOrFail($request->appointmentId);
        if ($this->clinic->id == $appointment->clinic->id && $appointment->isConfirmed()) {
            $data = $request->all();
            $data['appointment_id'] = $appointment->id;
            $examination = \App\Examination::create($data);
            $appointment->update(['status' => Appointment::STATUS_COMPLETED]);
            $mesage = (new AppointmentConfirmationEmail($appointment))->onQueue('emails');
            Mail::to($appointment->user->email)->queue($mesage);
            return response()->json($examination, Response::HTTP_OK);
        }
        unset($slug);
        return response()->json(Response::HTTP_BAD_REQUEST);
    }
}

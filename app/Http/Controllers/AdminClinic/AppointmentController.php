<?php

namespace App\Http\Controllers\AdminClinic;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminClinic\BaseController;
use App\Appointment;
use App\Clinic;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentConfirmationEmail;

class AppointmentController extends BaseController
{

    /**
     * Display a listing of appointment of clinic.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = $this->clinic->appointments()
            ->notPending()
            ->latest()
            ->with('user')
            ->paginate();
        return view('admin_clinic.appointments.index', ['appointments' => $appointments, 'clinic' => $this->clinic]);
    }

    /**
     * Display appointment of clinic edit page .
     *
     * @param String           $slug        slug
     * @param \App\Appointment $appointment appointment
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug, Appointment $appointment)
    {
        if ($this->clinic->id == $appointment->clinic->id) {
            return view('admin_clinic.appointments.show', ['slug' => $slug, 'appointment' => $appointment]);
        }
        return abort(404);
    }

    /**
     * Update a status in list appointmennts of clinic.
     *
     * @param \Illuminate\Http\Requests $request     request
     * @param String                    $slug        slug
     * @param \App\Appointment          $appointment appointment
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug, Appointment $appointment)
    {
        if ($this->clinic->id == $appointment->clinic->id) {
            $appointment->update(['status' => $request->status]);
            $message = (new AppointmentConfirmationEmail($appointment))
                ->onQueue('emails');
            Mail::to($appointment->user->email)
                ->queue($message);
            return response()->json(200);
        }
        unset($slug);
        return response()->json(500);
    }
}

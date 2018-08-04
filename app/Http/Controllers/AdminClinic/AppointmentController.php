<?php

namespace App\Http\Controllers\AdminClinic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Appointment;
use App\Clinic;
use App\Jobs\SendAppointmentConfirmationEmail;
use App\Mail\AppointmentConfirmationEmail;

class AppointmentController extends Controller
{

    /**
     * Display a listing of appointment of clinic.
     *
     * @param String $slug slug
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $clinic = Clinic::where('slug', '=', $slug)->firstOrFail();
        $appointments = Appointment::where('clinic_id', '=', $clinic->id)->orderBy('created_at', 'DESC')->with('user')->paginate();
        return view('admin_clinic.appointments.index', compact(['appointments', 'clinic']));
    }

    /**
     * Display appointment of clinic edit page .
     *
     * @param String           $slug        slug
     * @param \App\Appointment $appointment appointment
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($slug, Appointment $appointment)
    {
        $clinic = Clinic::where('slug', '=', $slug)->firstOrFail();
        if ($clinic->id == $appointment->clinic->id) {
            return view('admin_clinic.appointments.edit', compact(['slug', 'appointment']));
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
        $clinic = Clinic::where('slug', '=', $slug)->first();
        if ($clinic->id == $appointment->clinic->id) {
            $appointment->update(['status' => $request->status]);
            try {
                SendAppointmentConfirmationEmail::dispatch($appointment->user)->onQueue('emails')->delay(now()->addMinutes(1));
                return response()->json(200);
            } catch (\Exception $e) {
                return response()->json($e, 400);
            }
        }
        return response()->json(400);
    }
}

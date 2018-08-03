<?php

namespace App\Http\Controllers\AdminClinic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Appointment;
use App\Clinic;

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
        $appointments = Appointment::where('clinic_id', '=', $clinic->id)->with('user')->paginate();
        return view('admin_clinic.appointments.index', compact(['appointments', 'clinic']));
    }

    /**
     * Update a status in list appointmennts of clinic.
     *
     * @param \Illuminate\Http\Requests $request request
     * @param String                    $slug    slug
     *
     * @return \Illuminate\Http\Response
     */
    public function updateListAppointments(Request $request, $slug)
    {
        $appointments = Appointment::findOrFail($request->id);
        foreach ($appointments as $key => $appointment) {
            $appointment->status = $request->status[$key];
            $appointment->save();
        }
        session()->flash('flashType', 'success');
        session()->flash('flashMessage', __('admin_clinic/appointment.update.success'));
        return redirect()->back();
    }
}

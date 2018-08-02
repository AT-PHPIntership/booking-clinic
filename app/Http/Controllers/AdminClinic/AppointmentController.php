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
        $clinic = Clinic::where('slug', $slug)->firstOrFail();
        $appointments = $clinic->appointments()->latest()->with('user')->paginate();
        return view('admin_clinic.appointments.index', compact(['appointments', 'clinic']));
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
        $clinic = Clinic::where('slug', $slug)->first();
        if ($clinic->id == $appointment->clinic->id) {
            $appointment->update(['status' => $request->status]);
            return response()->json(200);
        }
        return response()->json(500);
    }
}

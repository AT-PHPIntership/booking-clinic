<?php

namespace App\Http\Controllers\AdminClinic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Appointment;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::where('clinic_id','=', 14)->with('user')->paginate(1);
        return view('admin_clinic.appointments.index', compact('appointments'));
    }

    public function updatemany(Request $request)
    {

    }
}

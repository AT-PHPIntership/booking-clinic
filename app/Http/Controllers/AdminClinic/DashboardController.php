<?php

namespace App\Http\Controllers\AdminClinic;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminClinic\BaseController;
use App\Clinic;
use App\Appointment;

class DashboardController extends BaseController
{
    /**
     * Display a listing of appointment of clinic.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = $this->clinic->appointments()->status(Appointment::STATUS_PENDING)->latest()->with('user')->paginate();
        $count = [
            'countPending' => $this->clinic->appointments()->status(Appointment::STATUS_PENDING)->count(),
            'countConfirmed' => $this->clinic->appointments()->status(Appointment::STATUS_CONFIRMED)->count(),
            'countCompleted' => $this->clinic->appointments()->status(Appointment::STATUS_COMPLETED)->count(),
            'countCancel' =>$this->clinic->appointments()->status(Appointment::STATUS_CANCEL)->count(),
        ];
        return view('admin_clinic.dashboard', ['appointments' => $appointments, 'clinic' => $this->clinic, 'count' => $count]);
    }
}

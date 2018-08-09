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
        $status = Appointment::STATUS;
        $appointments = $this->clinic->appointments()->where('status', $status['Pending'])->latest()->with('user')->paginate();
        $count = [
            'countPending' => $this->clinic->appointments()->where('status', $status['Pending'])->count(),
            'countConfirmed' => $this->clinic->appointments()->where('status', $status['Confirmed'])->count(),
            'countCompleted' => $this->clinic->appointments()->where('status', $status['Completed'])->count(),
            'countCancel' =>$this->clinic->appointments()->where('status', $status['Cancel'])->count(),
        ];
        return view('admin_clinic.dashboard', ['appointments' => $appointments, 'clinic' => $this->clinic, 'count' => $count]);
    }
}

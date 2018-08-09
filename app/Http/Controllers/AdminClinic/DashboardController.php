<?php

namespace App\Http\Controllers\AdminClinic;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminClinic\BaseController;
use App\Clinic;

class DashboardController extends BaseController
{
    /**
     * Display a listing of appointment of clinic.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = $this->clinic->appointments()->where('status', '0')->latest()->with('user')->paginate();
        $count = [
            $this->clinic->appointments()->where('status', '0')->count(),
            $this->clinic->appointments()->where('status', '1')->count(),
            $this->clinic->appointments()->where('status', '2')->count(),
            $this->clinic->appointments()->where('status', '3')->count(),
        ];
        return view('admin_clinic.dashboard', ['appointments' => $appointments, 'clinic' => $this->clinic, 'count' => $count]);
    }
}

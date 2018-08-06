<?php

namespace App\Http\Controllers\AdminClinic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Clinic;

class DashboardController extends Controller
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
        return view('admin_clinic.dashboard', compact(['appointments', 'clinic']));
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ClinicType;

class ClinicTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clinicTypes = ClinicType::all();
        return view('admin.clinic_types.index', compact('clinicTypes'));
    }
}

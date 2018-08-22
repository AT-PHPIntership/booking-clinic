<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClinicController extends Controller
{
    /**
    * Display list of clinics.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('user.clinic.index');
    }

    /**
     * Display the specified clinic.
     *
     * @return void
     */
    public function show()
    {
        return view('user.clinic.show');
    }
}

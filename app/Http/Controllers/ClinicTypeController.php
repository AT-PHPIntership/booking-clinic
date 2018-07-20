<?php

namespace App\Http\Controllers;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClinicType  $clinicType
     * @return \Illuminate\Http\Response
     */
    public function show(ClinicType $clinicType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClinicType  $clinicType
     * @return \Illuminate\Http\Response
     */
    public function edit(ClinicType $clinicType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClinicType  $clinicType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClinicType $clinicType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClinicType  $clinicType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClinicType $clinicType)
    {
        //
    }
}

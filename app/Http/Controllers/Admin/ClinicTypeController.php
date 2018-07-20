<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ClinicType;
use App\Http\Requests\ClinicTypeRequest;

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
        return view('admin.clinic_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Requests\ClinicTypeRequest $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ClinicTypeRequest $request)
    {
        ClinicType::create($request->all());
        return redirect()->route('admin.clinic-types.index')->with(['flashType'=>'success', 'flashMessage' =>'A new clinic type is added']);
    }
}

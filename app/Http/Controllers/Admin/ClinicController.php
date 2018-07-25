<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ClinicRequest;
use App\Clinic;
use App\ClinicType;

class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clinics = Clinic::with('clinicType')->paginate();
        return view('admin.clinics.index')->with('clinics', $clinics);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clinicTypes = ClinicType::all();
        return view('admin.clinics.create', compact('clinicTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Requests\ClinicRequest $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ClinicRequest $request)
    {
        Clinic::create($request->all());
        session()->flash('flashType', 'success');
        session()->flash('flashMessage', __('admin/layout.message.success'));
        return redirect()->route('admin.clinics.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ClinicRequest;
use App\Clinic;
use App\ClinicType;
use App\Image;

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
        $clinic = Clinic::create($request->all());

        if ($request->hasFile('images')) {
            $clinic->uploadImage($request->images);
        }

        session()->flash('flashType', 'success');
        session()->flash('flashMessage', __('admin/clinic.store.success'));
        return redirect()->route('admin.clinics.index');
    }

    /**
     * Show the form for editting a new resource.
     *
     * @param \App\Clinic $clinic clinic
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Clinic $clinic)
    {
        $clinicTypes = ClinicType::all();
        return view('admin.clinics.edit', compact('clinic', 'clinicTypes'));
    }

    /**
     * Update a resource was editted.
     *
     * @param \Illuminate\Http\Requests\ClinicRequest $request request
     * @param \App\Clinic                             $clinic  clinic
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ClinicRequest $request, Clinic $clinic)
    {
        $clinic->update($request->all());
        session()->flash('flashType', 'success');
        session()->flash('flashMessage', __('admin/clinic.update.success'));
        return redirect()->route('admin.clinics.index');
    }
}

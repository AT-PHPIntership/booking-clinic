<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ClinicType;
use App\Http\Requests\Admin\ClinicTypeRequest;

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
        session()->flash('flashType', 'success');
        session()->flash('flashMessage', __('admin/clinic_type.store.success'));
        return redirect()->route('admin.clinic-types.index');
    }

    /**
     * Show the form for editting a new resource.
     *
     * @param \App\ClinicType $clinicType clinicType
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(ClinicType $clinicType)
    {
        return view('admin.clinic_types.edit')->with('type', $clinicType);
    }

    /**
     * Update a resource was editted.
     *
     * @param \App\Http\Admin\Requests\ClinicTypeRequest $request    request
     * @param \App\ClinicType                            $clinicType clinicType
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ClinicTypeRequest $request, ClinicType $clinicType)
    {
        $clinicType->update($request->all());
        session()->flash('flashType', 'success');
        session()->flash('flashMessage', __('admin/clinic_type.update.success'));
        return redirect()->route('admin.clinic-types.index');
    }

    /**
     * Delete a resource.
     *
     * @param \App\ClinicType $clinicType clinicType
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClinicType $clinicType)
    {
        if ($clinicType->clinics()->count()) {
            session()->flash('flashType', 'danger');
            session()->flash('flashMessage', __('admin/clinic_type.delete.error'));
        } else {
            $clinicType->delete();
            session()->flash('flashType', 'success');
            session()->flash('flashMessage', __('admin/clinic_type.delete.success'));
        }
        return redirect()->route('admin.clinic-types.index');
    }
}

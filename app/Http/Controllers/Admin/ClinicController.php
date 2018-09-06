<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ClinicRequest;
use App\Clinic;
use App\ClinicType;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterClinic;
use App\Jobs\SendRegisterEmailAdmin;

class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clinics = Clinic::filter()->latest()->with('clinicType')->paginate();
        return view('admin.clinics.index', ['clinics' => $clinics]);
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
        $data = $request->all();
        $data['slug'] = str_slug($data['name']);
        $clinic = Clinic::create($data);

        if ($request->hasFile('images')) {
            $clinic->uploadImage($request->images);
        }

        SendRegisterEmailAdmin::dispatch($clinic)->onQueue('emails');

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
        $data = $request->all();
        $data['slug'] = str_slug($data['name']);
        $clinic->update($data);

        session()->flash('flashType', 'success');
        session()->flash('flashMessage', __('admin/clinic.update.success'));
        return redirect()->route('admin.clinics.index');
    }

    /**
     * Delete a resource was editted.
     *
     * @param \App\Clinic $clinic clinic
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clinic $clinic)
    {
        $clinic->delete();
        session()->flash('flashType', 'success');
        session()->flash('flashMessage', __('admin/clinic.delete.success'));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Clinic $clinic clinic
     *
     * @return void
     */
    public function show(Clinic $clinic)
    {
        return view('admin.clinics.show', compact('clinic'));
    }
}

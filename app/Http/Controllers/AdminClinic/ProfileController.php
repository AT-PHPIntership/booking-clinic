<?php

namespace App\Http\Controllers\AdminClinic;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminClinic\BaseController;
use App\Http\Requests\AdminClinic\ClinicRequest;
use App\Clinic;
use App\ClinicType;
use App\ClinicImage;

class ProfileController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $clinic = $this->clinic;
        return view('admin_clinic.profile.show', compact('clinic'));
    }

    /**
     * Show the form for editting a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $clinic = $this->clinic;
        $clinicTypes = ClinicType::all();
        return view('admin_clinic.profile.edit.clinic', compact('clinic', 'clinicTypes'));
    }

    /**
     * Update a resource was editted.
     *
     * @param \App\Http\Requests\AdminClinic\ClinicRequest $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ClinicRequest $request)
    {
        $data = $request->all();
        $data['slug'] = str_slug($data['name']);
        $clinic = $this->clinic;
        $clinic->update($data);

        $deletedImageIdRetrieved = $data['image_deleted'];
        $deletedImageIdUnique = array_unique(explode(",", $deletedImageIdRetrieved));
        $deletedImageId = array_filter($deletedImageIdUnique, 'is_numeric');

        if (count($deletedImageId)) {
            $clinic->deleteImage($deletedImageId);
        }
        
        if ($request->hasFile('images')) {
            $clinic->uploadImage($request->images);
        }

        session()->flash('flashType', 'success');
        session()->flash('flashMessage', __('admin_clinic/profile.update.success.clinic'));
        return redirect()->route('admin_clinic.profile.show', $clinic->slug);
    }
}

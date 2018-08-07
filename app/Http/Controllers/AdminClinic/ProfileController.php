<?php

namespace App\Http\Controllers\AdminClinic;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminClinic\BaseController;
use App\Http\Requests\AdminClinic\ClinicRequest;
use App\Http\Requests\AdminClinic\ProfileAdminRequest;
use App\Clinic;
use App\ClinicType;
use App\ClinicImage;
use Hash;

class ProfileController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('admin_clinic.profile.show', ['clinic' => $this->clinic]);
    }

    /**
     * Show the form for editting a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $clinicTypes = ClinicType::all();
        return view('admin_clinic.profile.edit.clinic', compact('clinicTypes'))->with(['clinic' => $this->clinic]);
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

        $delImgIdRetrieved = $data['image_deleted'];
        $deletedImageIdUnique = array_unique(explode(",", $delImgIdRetrieved));
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

    /**
     * Show the form for editting a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editAdmin()
    {
        return view('admin_clinic.profile.edit.admin');
    }

    /**
     * Update a resource was editted.
     *
     * @param \App\Http\Requests\AdminClinic\ProfileAdminRequest $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function updateAdmin(ProfileAdminRequest $request)
    {
        $admin = $this->clinic->admin;
        $admin->fill([
            'password' => Hash::make($request->input('password'))
        ])->save();

        session()->flash('flashType', 'success');
        session()->flash('flashMessage', __('admin_clinic/profile.update.success.admin'));
        return redirect()->route('admin_clinic.profile.show', $this->clinic->slug);
    }
}

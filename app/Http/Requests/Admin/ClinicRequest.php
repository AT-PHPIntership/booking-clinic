<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ClinicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                $id = '';
                break;
            case 'PUT':
                $id = $this->clinic->id;
                break;
        }
        return [
            'name' => 'required|string|max:100|unique:clinics,name,' . $id,
            'email' => 'required|string|email|max:255|unique:clinics,email,' . $id,
            'phone' => 'required|numeric|digits_between:8,12',
            'address' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'lat' => 'nullable|numeric|min:-90|max:90',
            'lng' => 'nullable|numeric|min:-180|max:180',
            'clinic_type_id' => 'required|exists:clinic_types,id',
            'images.*' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ];
    }
}

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
        return [
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:255|unique:clinics,email',
            'phone' => 'required|numeric|digits_between:8,11',
            'address' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'lat' => 'nullable|numeric|min:-90|max:90',
            'lng' => 'nullable|numeric|min:-180|max:180',
            'clinic_type_id' => 'required|exists:clinic_types,id'
        ];
    }
}

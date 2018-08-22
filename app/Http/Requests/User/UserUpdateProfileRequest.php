<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateProfileRequest extends FormRequest
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
            'name' => 'required|string|regex:/^[a-zA-Z]+$/',
            'address' => 'nullable|string|max:255',
            'dob' => 'nullable|date_format:"Y-m-d"',
            'phone' => 'nullable|numeric|digits_between:8,12',
            'gender' => 'boolean',
        ];
    }
}

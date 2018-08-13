<?php

namespace App\Http\Requests\AdminClinic;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\AdminClinic\ExistedPassword;

class ProfileAdminRequest extends FormRequest
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
            'password_current' => ['required', 'string', new ExistedPassword],
            'password' => 'required|string|min:6|confirmed|different:password_current',
        ];
    }
}

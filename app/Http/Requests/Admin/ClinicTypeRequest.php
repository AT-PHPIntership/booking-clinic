<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ClinicTypeRequest extends FormRequest
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
                return ['name' => 'required|unique:clinic_types,name'];
                break;
            case 'PUT':
                return ['name' => 'required|unique:clinic_types,name,' . $this->clinicType->id];
                break;
        }
    }
}

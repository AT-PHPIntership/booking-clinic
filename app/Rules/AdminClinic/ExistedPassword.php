<?php

namespace App\Rules\AdminClinic;

use Illuminate\Contracts\Validation\Rule;
use Auth;
use Hash;

class ExistedPassword implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule for existed password passes.
     *
     * @param string $attribute attribute
     * @param mixed  $value     value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        unset($attribute);
        $user = request()->user();
        return Hash::check($value, $user->password);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('admin_clinic/profile.update.error.password');
    }
}

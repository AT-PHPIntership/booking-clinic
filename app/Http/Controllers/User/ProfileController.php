<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
    * Display user's profile.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('user.profile');
    }

    /**
     * Display change password form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showChangePasswordForm()
    {
        return view('user.change_password');
    }

    /**
     * Display edit profile form
     *
     * @return \Illuminate\Http\Response
     */
    public function showEditProfileForm()
    {
        return view('user.edit_profile');
    }
}

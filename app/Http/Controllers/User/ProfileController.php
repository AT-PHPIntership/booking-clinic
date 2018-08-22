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
}

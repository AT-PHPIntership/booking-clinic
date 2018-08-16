<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
    * Display index page when accessing the website.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('user.home');
    }
}

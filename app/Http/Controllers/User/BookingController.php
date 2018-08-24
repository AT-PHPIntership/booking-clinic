<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    /**
     * Display booking page.
     *
     * @return \Illuminate\Http\Response
     */
    public function showBookingForm()
    {
        return view('user.booking');
    }

    /**
     * Display booking success page.
     *
     * @return \Illuminate\Http\Response
     */
    public function showBookingSuccess()
    {
        return view('user.booking_success');
    }
}

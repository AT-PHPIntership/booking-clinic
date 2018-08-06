<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Admin;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:web-admin')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('web-admin');
    }

    /**
     * The user has logged out of the application.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return mixed
     */
    protected function loggedOut(Request $request)
    {
        unset($request);
        return redirect('admin/login');
    }

    /**
     * Return redirect path after login
     *
     * @return string
     */
    protected function redirectTo()
    {
        $user = Auth::guard('web-admin')->user();

        return $user->isClinicAdmin()
            ? '/admin/' . $user->clinic->slug . '/dashboard'
            : '/admin/dashboard';
    }
}

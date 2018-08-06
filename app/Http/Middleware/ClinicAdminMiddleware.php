<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ClinicAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request request
     * @param \Closure                 $next    next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::guard('web-admin')->user();
        if (Auth::check() && $user && $user->isClinicAdmin()) {
            if ($request->slug === $user->clinic->slug) {
                return $next($request);
            }
            return redirect('admin/' . $user->clinic->slug . '/dashboard');
        }
        return redirect('home');
    }
}

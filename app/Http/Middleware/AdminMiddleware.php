<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Admin;

class AdminMiddleware
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
        if (Auth::check()) {
            // handing code for admin and clinic admin will be updated if db admin with role is existed
            return $next($request);
        }
        return redirect('home');
    }
}

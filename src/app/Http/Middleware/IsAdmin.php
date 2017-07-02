<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Check for admin
        if (Auth::user()->status !== 1) {
            return back()->withErrors(['msg' => 'Not available']);
        }
        return $next($request);
    }
}

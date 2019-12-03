<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isEmployee
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
        if (Auth::guard('api')->user() &&  Auth::guard('api')->user()->hasRole('employee')) {
            return $next($request);
        }

        return response()->json(['success'=> false, 'error'=> 'user role doesnt match employee']);
    }
}

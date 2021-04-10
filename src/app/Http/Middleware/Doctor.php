<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class Doctor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::guest() && Auth::user()->role !== 'doctor')
          return response(['status' => 'User with role '.Auth::user()->role.' cannot do this action'],401);

        if(!Auth::guest() && Auth::user()->role == 'doctor')
          return $next($request);

        if(!$request->expectsJson()){
          return redirect('login');
        }else{
          return response(['status' => 'Need login to perform this action'],400);
        }
    }
}

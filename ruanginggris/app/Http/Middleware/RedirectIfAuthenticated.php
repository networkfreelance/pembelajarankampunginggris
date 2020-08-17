<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
          $level=Auth::user()->level;
          // if($level=="admin"){
          //   //return redirect('/admindashboard');
          //   return $this->redirectTo = '/admindashboard';
          // }else if($level=="member"){
             return redirect('/admindashboard');
          //    return $this->redirectTo = '/memberdashboard';
          // }
        }

        return $next($request);
    }
}

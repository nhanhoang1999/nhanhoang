<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckLogoutOut
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
        if(Auth::guard('UserAdmin')->guest()){
            return redirect()->intended('login');
        }
        return $next($request);
    }
    
}

<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class roles_admin
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
        if(Auth::guard('UserAdmin')->user()->hasRole('admin')){
            return $next($request); 
        }
            return redirect('/admin/home')->with('error','Bạn không có quyền truy cập chức năng này!');  
    }
}

<?php
namespace App\Http\Middleware;
use Closure;
class RedirectIfNotAdmin
{
    public function handle($request, Closure $next, $guard="admin")
    {
        //kebalik
        if(auth()->guard($guard)->check()) {
            return $next($request);
        }
        return redirect(route('adminlogin'));
        
    }
}
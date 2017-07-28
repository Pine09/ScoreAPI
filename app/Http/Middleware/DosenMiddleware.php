<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Auth;

class DosenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   $role=Auth::user()->role;
        if($role!="Lecturer"){
           throw new AccessDeniedHttpException("Please Login With Lecturer Account");    
        }
        return $next($request);
    }
}

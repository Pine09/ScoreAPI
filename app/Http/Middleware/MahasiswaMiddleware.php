<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class MahasiswaMiddleware
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
        if($role!="Student"){
           throw new AccessDeniedHttpException("Please Login With Student Account");    
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class AdminMiddleware
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
        if($role!="Admin"){
           throw new AccessDeniedHttpException("Please Login With Admin Account");    
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;

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
        if($role!="Mahasiswa"){
           throw new AccessDeniedHttpException("Please Login With Student Account");    
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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

         

        if($request->user()->rol != 'admin')
        {
            abort(403, "¡Acceso denegado!.");

        }

       
        return $next($request);
       
    } 
}

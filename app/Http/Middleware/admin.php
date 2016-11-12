<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

class admin
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
        
        if(Auth::check() )
            return $next($request);
        else{
            Session::flash('alert-show','SI');
            Session::flash('alert-msj',"<br> Lo siento. Primero debe iniciar sesión");
            Session::flash('alert-type','alert-danger');
            return redirect('auth/login');
        }
    }
}

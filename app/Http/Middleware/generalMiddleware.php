<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class generalMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {   

        if (isset(Session::get('user')->name) && Session::get('user')['role'] == 1) {
            
            return Redirect('/admin/dashboard');   
        }else if (isset(Session::get('user')->name) && Session::get('user')['role'] == 2) {
            
            return Redirect('/user/dashboard');   
        }else{

            return $next($request);
        }
    }
}

<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;

use Closure;
use Session;
use Auth;

class _auth
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
        if (isset(Session::get('user')->name) && Session::get('user')->role == 1) {
            return $next($request);
        }else{
            return Redirect("/login");
        }
    }
}

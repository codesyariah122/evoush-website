<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use  Auth;

class AdminMiddleware
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
        if(!in_array("ADMIN", json_decode(Auth::user()->roles))){
            return redirect()->to('logout');
        }
        return $next($request);
    }
}

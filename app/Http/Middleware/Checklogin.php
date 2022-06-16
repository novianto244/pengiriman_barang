<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Checklogin
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
        $data = $request->session()->all();
        
        if(array_key_exists("login", $data)){
            return $next($request);
        }else{
            return redirect()->route('login');
        }        
    }
}

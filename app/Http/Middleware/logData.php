<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
class logData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        
     
        $sessionData= (\Session::get('logData'));
      
        if (empty(\Session::get('logData'))) {

            return redirect('/create');

        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;

class AuthenticateMiddleWare
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
        if(session()->get('USER_ID') != null){
        return $next($request);    
        }
        else{
            return redirect('/login');
        }
        return redirect('/login');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class RootTest
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
        if(Auth::user()->status == 'user'){
            return redirect('home');
        } else {
            return $next($request);
        }
    }
}

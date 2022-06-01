<?php

namespace App\Http\Middleware;

use Closure;

class isLoggedIn
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
        if($request->user())
        {
            return $next($request);
        }
        
        return redirect('/admin/login');
    }
}

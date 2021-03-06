<?php

namespace App\Http\Middleware;

use Closure;

class isNegotiator
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
        $user = $request->user();
        
        if ($user && $user->role == '2')
        {
            return $next($request); 
        }
        
        return redirect('/');
    }
}

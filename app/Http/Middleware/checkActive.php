<?php

namespace App\Http\Middleware;

use Closure;

class checkActive
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
        
        if ($user && $user->is_active == 1)
        {
            return $next($request); 
        }
        
        return redirect('/ban');
    }
}

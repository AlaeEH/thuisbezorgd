<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\URL;

class AllRoutes
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
        URL::defaults([
            'restaurant_id' => $request->restaurant_id
        ]);

        return $next($request);
    }
}

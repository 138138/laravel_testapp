<?php

namespace App\Http\Middleware;

use Closure;

class MyRouteMiddleware2
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$arg1,$arg2)
    {
        echo "Route Middleware2 : handle method called : Arguments - ".$arg1." - ".$arg2."<br>";
        return $next($request);
    }

    public function terminate($request,$response)
    {
      echo "Route Middleware2 : terminate method execute last <br>";
    }
}

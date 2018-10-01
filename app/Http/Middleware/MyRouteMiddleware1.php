<?php

namespace App\Http\Middleware;

use Closure;

class MyRouteMiddleware1
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
      echo "Route Middleware1 : handle method called <br>";
        return $next($request);
    }

    public function terminate($request,$response)
    {
      echo "Route Middleware1 : terminate method execute last <br>";
    }
}

<?php

namespace App\Http\Middleware;

use Closure;

class MyGlobalMiddleware
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
      echo "Global Middleware : Handle method : Default call at starting <hr>";
      return $next($request);
    }

    public function terminate($request,$response)
    {
      echo "<hr> Global Middleware : terminate method : Default call at Ending";
    }
}

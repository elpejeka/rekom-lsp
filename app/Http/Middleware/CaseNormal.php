<?php

namespace App\Http\Middleware;

use Closure;

class CaseNormal
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
         $path = $request->path();

         if ($path !== strtolower($path)) {
             return redirect(strtolower($path));
         }

         return $next($request);
    }
}

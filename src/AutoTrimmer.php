<?php

namespace App\Http\Middleware;

use Closure;

class AutoTrimmer {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $trim_if_string = function ($var)
        {
            return is_string($var) ? trim($var) : $var;
        };

        $request->merge(array_map($trim_if_string, $request->all()));
        return $next($request);
    }
}


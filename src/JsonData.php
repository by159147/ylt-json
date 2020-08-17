<?php

namespace Faed\Json;

use Closure;
use Illuminate\Http\Request;

class JsonData
{
    /**
     * Handle an incoming request.
     *
     * @param Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}

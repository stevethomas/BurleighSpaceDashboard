<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class IpWhitelist
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!in_array($request->ip(), [
            env("IP_WHITELIST"),
            '127.0.0.1',
        ])
        ) {
            return response('Unauthorized.', 401);
        }

        Auth::loginUsingId(1);

        return $next($request);
    }
}

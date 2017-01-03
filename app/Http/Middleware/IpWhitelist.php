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
        if (!$this->ipIsAllowed($request)) {
            return response('Unauthorized.', 401);
        }

        // login as user 1 so private broadcasting works
        Auth::loginUsingId(1);

        // carry on
        return $next($request);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    private function ipIsAllowed($request)
    {
        if ($request->ip() == '127.0.0.1') {
            // always allow localhost
            return true;
        }

        $whitelist =  env("IP_WHITELIST");

        if (!is_null($whitelist)) {
            if (ends_with($whitelist, '*') and starts_with($request->ip(), substr($whitelist, 0, -1))) {
                // accept an IP range
                return true;
            } else {
                // exact match
                return $request->ip() == $whitelist;
            }
        }

        return false;
    }
}

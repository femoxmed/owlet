<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Contracts\Auth\Factory as Auth;

class OptionalAuth extends Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
// use Auth;
    public function handle($request, Closure $next, ...$guards)
    {
        try {
            // dd($request);
            $this->authenticate($request, $guards);
        } catch(AuthenticationException $e) {
            // dont do anything
        }

        return $next($request);
    }
}

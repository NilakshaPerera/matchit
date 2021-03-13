<?php

namespace App\Http\Middleware;

use App\Providers\AppServiceProvider;
use Closure;
use Auth;

class ClinetUser
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
        if ( Auth::user()->roles_id == AppServiceProvider::Client ) {
            return $next($request);
        }
        abort(403);
    }
}

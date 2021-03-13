<?php

namespace App\Http\Middleware;

use App\Providers\AppServiceProvider;
use Closure;
use Auth;

class AdminUser
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
        if (
            Auth::user()->roles_id == AppServiceProvider::SeniorClientServiceAgent ||
            Auth::user()->roles_id == AppServiceProvider::ClientServiceAgent ||
            Auth::user()->roles_id == AppServiceProvider::FinanceManager ||
            Auth::user()->roles_id == AppServiceProvider::Receptionist
        ) {
            return $next($request);
        }
        abort(403);
    }
}

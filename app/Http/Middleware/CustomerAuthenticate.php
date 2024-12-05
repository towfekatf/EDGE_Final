<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CustomerAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard("customer")->user()) {
            return $next($request);
        }

        if ($request->ajax() || $request->wantsJson()) {
            return response("Unauthorized.", 401);
        } else {
            return redirect()->route("website.customer.login");
        }
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class OperatorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Gate::allowIf(
            $request->user()?->role === "operator" ||
            $request->user()?->role === "admin",
            __("You are not authorized to access this page.")
        );
        return $next($request);
    }
}

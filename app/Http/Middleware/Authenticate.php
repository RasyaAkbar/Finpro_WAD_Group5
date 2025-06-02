<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    public function handle($request, Closure $next)
    {
        // Add exceptions for the login, register, and homepage routes
        if ($request->routeIs('login') || $request->routeIs('register') || $request->is('/')) {
            return $next($request);
        }

        // If not logged in, redirect to login with a flash message
        if (!Auth::check()) {
            return redirect()->route("login")->with("error", "You must be logged in to access this page.");
        }

        return $next($request);
    }
}

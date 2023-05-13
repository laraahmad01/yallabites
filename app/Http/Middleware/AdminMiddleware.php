<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Check if the user has the role "Admin"
        if ($request->user() && $request->user()->hasRole('Admin')) {
            return $next($request);
        }
        
        // Redirect to the "access denied" view if not an admin
        return redirect()->route('access.denied');
    }
}

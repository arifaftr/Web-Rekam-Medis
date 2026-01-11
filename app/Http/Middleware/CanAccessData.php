<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CanAccessData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Jika user adalah superadmin, tolak akses ke data routes
        if (auth()->check() && auth()->user()->hasRole('superadmin')) {
            abort(403, 'Superadmin hanya dapat mengelola user.');
        }

        return $next($request);
    }
}

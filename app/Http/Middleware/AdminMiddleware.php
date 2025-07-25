<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated and has admin role
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            // Redirect to homepage with error message
            return redirect('/')->with('error', 'Akses ditolak. Anda tidak memiliki izin untuk mengakses halaman admin.');
        }

        return $next($request);
    }
}

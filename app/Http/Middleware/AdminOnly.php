<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class AdminOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /*
         **
         * we are checking for the is_admin boolean and also checking if the user is authenticated
         **
         */
        if (auth()->check() && auth()->user()->is_admin) {
            Log::info('Admin access granted to user ID: ' . auth()->user()->id);
            return $next($request);
        }
        // Log the unauthorized access attempt
        Log::warning('Unauthorized access attempt by user ID: ' . (auth()->check() ? auth()->user()->id : 'guest'));
        return response()->json(['error' => 'Unauthorized'], 403);
    }
}

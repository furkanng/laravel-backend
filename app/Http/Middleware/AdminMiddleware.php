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
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Kullanıcı oturum açmış mı kontrol ediyoruz.
        if (auth()->guard("admin-api")->check()) {
            return $next($request);
        }

        return response()->json([
            "status" => false,
            "message" => "Unauthorized",
        ], 401);
    }
}

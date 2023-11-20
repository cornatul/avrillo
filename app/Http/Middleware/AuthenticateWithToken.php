<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
final class AuthenticateWithToken
{
    public function handle($request, Closure $next)
    {
        $token = $request->header('Authorization');

        if ($token != env('API_TOKEN')) {
            return response()->json(['error' => 'Unauthorized.'], 401);
        }

        return $next($request);
    }
}
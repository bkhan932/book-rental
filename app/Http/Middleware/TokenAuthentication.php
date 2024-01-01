<?php
namespace App\Http\Middleware;

use Closure;

class TokenAuthentication
{
    public function handle($request, Closure $next)
    {
        $providedToken = $request->header('X-Api-Token') ?? $request->query('api_token');

        $validToken = env('API_TOKEN');

        if ($providedToken && hash_equals($validToken, $providedToken)) {
            return $next($request);
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    }
}

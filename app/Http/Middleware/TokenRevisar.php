<?php

namespace App\Http\Middleware;

use App\Models\Token;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenRevisar
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('Authorization');

        if (!$token) {
            return response()->json(['error' => 'No token provided'], 401);
        }

        $token = str_replace('Bearer ', '', $token);

        $tokenRecord = Token::where('token', $token)->first();

        if (!$tokenRecord || $tokenRecord->expiracion < now()) {
            return response()->json(['error' => 'Token invalid or expired'], 401);
        }

        return $next($request);
    }

}

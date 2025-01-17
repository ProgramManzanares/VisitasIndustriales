<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class JWTMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        try{
            JWTAuth::parseToken() -> authenticate();
        }catch(Exception $e){
            return response()-> json(['error' => 'Token Invalido o no proporcionado'], 401);
        }

        return $next($request);
    }
}

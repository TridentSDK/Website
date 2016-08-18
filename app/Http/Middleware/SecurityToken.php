<?php

namespace TridentSDK\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use TridentSDK\User;

class SecurityToken {

    public function handle(Request $request, Closure $next){
        if (!$request->has("token") || !User::whereToken($request->get("token"))->exists()) {
            return response()->json(ApiError::INVALID_SECURITY_TOKEN, 401);
        }

        \Auth::setUser(User::whereToken($request->get("token"))->first());

        return $next($request);
    }
}

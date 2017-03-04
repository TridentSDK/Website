<?php

namespace TridentSDK\Http\Middleware;

use Closure;

class DisableDebugbar {

    public function handle($request, Closure $next){
    	$response = $next($request);

        if(!\Auth::check() || !\Auth::user()->developer || !starts_with($response->headers->get("Content-Type"), "text/html")){
        	\Debugbar::disable();
        }

        return $response;
    }

}
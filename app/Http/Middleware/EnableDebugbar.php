<?php

namespace TridentSDK\Http\Middleware;

use Closure;

class EnableDebugbar {

    public function handle($request, Closure $next){
        if(!\Auth::check() || !\Auth::user()->developer){
            \Debugbar::disable();
        }

        return $next($request);
    }

}
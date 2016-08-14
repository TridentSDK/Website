<?php

namespace TridentSDK\Http\Middleware;

use Closure;

class UpdateOnline {

    public function handle($request, Closure $next){
        if(\Auth::check()){
            \Auth::user()->updateLastOnline();
        }

        return $next($request);
    }

}
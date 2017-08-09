<?php

namespace TridentSDK\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use TridentSDK\User;

class Admin {

    public function handle(Request $request, Closure $next){
        if(\Auth::check()){
            if(\Auth::user()->rank()->isAdmin()){
                return $next($request);
            }
        }

        return redirect("/401");
    }

}

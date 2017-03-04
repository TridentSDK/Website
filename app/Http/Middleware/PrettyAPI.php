<?php

namespace TridentSDK\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use TridentSDK\User;

class PrettyAPI {

    public function handle(Request $request, Closure $next){

	    /**
	     * @var JsonResponse
	     */
	    $response = $next($request);

	    if(!is_null($request->get("pretty"))){
	    	$response->setEncodingOptions(JSON_PRETTY_PRINT);
	    }

        return $response;
    }

}

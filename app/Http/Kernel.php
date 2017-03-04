<?php

namespace TridentSDK\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \TridentSDK\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \TridentSDK\Http\Middleware\VerifyCsrfToken::class,
            \TridentSDK\Http\Middleware\HttpsProtocol::class,
            \TridentSDK\Http\Middleware\DisableDebugbar::class,
            \TridentSDK\Http\Middleware\UpdateOnline::class,
        ],

        'api' => [
            'throttle:60,1',
	        \TridentSDK\Http\Middleware\PrettyAPI::class,
            \TridentSDK\Http\Middleware\DisableDebugbar::class,
        ],

	    'repository' => [
		    \TridentSDK\Http\Middleware\DisableDebugbar::class,
	    ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \TridentSDK\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'can' => \Illuminate\Foundation\Http\Middleware\Authorize::class,
        'guest' => \TridentSDK\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'token' => \TridentSDK\Http\Middleware\SecurityToken::class,
    ];
}

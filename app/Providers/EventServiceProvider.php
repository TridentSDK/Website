<?php

namespace TridentSDK\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider {

    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'TridentSDK\Events\SomeEvent' => [
            'TridentSDK\Listeners\EventListener',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @return void
     */
    public function boot(){
        parent::boot();
    }
}

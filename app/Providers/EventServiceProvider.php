<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\EventUserLoggedIn;
use App\Listeners\ListenerUserLoggedIn;
use App\Events\EventUserRegistered;
use App\Listeners\ListenerUserRegistered;

use App\Listeners\ListenerTransactionAdded;
use App\Events\EventTransactionAdded;

use App\Events\EventBudgetCreated;
use App\Listeners\ListenerBudgetCreated;


class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        
        ],
        
        EventUserLoggedIn::class => [
        ListenerUserLoggedIn::class,

                                     ],

        EventUserRegistered::class => [
        ListenerUserRegistered::class,
                                      ],

        EventBudgetCreated::class => [
        ListenerBudgetCreated::class,
                                      ],

        EventTransactionAdded::class => [
        ListenerTransactionAdded::class,
                                      ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

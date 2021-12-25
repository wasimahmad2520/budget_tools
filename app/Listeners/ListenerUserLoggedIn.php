<?php

namespace App\Listeners;

use App\Events\EventUserLoggedIn;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ListenerUserLoggedIn
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  EventUserLoggedIn  $event
     * @return void
     */
    public function handle(EventUserLoggedIn $event)
    {
        //
    }
}

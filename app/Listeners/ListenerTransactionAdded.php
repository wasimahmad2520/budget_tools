<?php

namespace App\Listeners;

use App\Events\EventTransactionAdded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ListenerTransactionAdded
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
     * @param  EventTransactionAdded  $event
     * @return void
     */
    public function handle(EventTransactionAdded $event)
    {
     return $event->transaction;
    }
}

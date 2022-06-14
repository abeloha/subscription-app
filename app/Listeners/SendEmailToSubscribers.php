<?php

namespace App\Listeners;

use App\Events\Published;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailToSubscribers
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
     * @param  \App\Events\Published  $event
     * @return void
     */
    public function handle(Published $event)
    {
        $post = $event->post;

        //get subscribers
        $ubscribers = $post->website->subscriptions;
        foreach ($ubscribers as $ubscriber) {
            //dispatch email
            $ubscriber->notify($post);
        }

    }
}

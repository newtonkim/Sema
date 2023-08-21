<?php

namespace App\Listeners;

use App\Events\SemaCreated;
use App\Models\User;
use App\Notifications\NewSema;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendSemaCreatedNotifications implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SemaCreated $event): void
    {
        foreach (User::whereNot('id', $event->sema->user_id)->cursor() as $user) {
            $user->notify(new NewSema($event->sema));
        }
    }
}

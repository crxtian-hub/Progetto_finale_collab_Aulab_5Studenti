<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Session;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeNewUser
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
    public function handle(Registered $event)
    {
        $user = $event->user;
        Session::flash('status', 'Benvenut*, ' . $user->name . '! La tua registrazione è avvenuta con successo.');
    }
}


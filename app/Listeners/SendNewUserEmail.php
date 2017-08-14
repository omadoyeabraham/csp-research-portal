<?php

namespace App\Listeners;

use App\Events\NewUserCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

use App\Mail\newUserRegistered;

class SendNewUserEmail
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
     * @param  NewUserCreated  $event
     * @return void
     */
    public function handle(NewUserCreated $event)
    {
        $newUser = $event->user;

        $toEmail = $newUser->email;

        Mail::to("omadoyeabraham@gmail.com")
            ->cc("abraham.omadoye@cardinalstone.com")
            ->send(new newUserRegistered ($newUser));

    }
}

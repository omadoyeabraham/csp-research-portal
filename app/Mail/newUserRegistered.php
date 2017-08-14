<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\User;

class newUserRegistered extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The new User who just registered
     * 
     * @var User
     */
    public $user;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * Details the e-mail to be sent to newly registered users
     * 
     * @return $this
     */
    public function build()
    {
        return $this->from('research@cardinalstone.com')
                    ->view('emails.newUserRegistered')
                    ->with([
                            'first_name' => $this->user->first_name,
                            'last_name' => $this->user->last_name,
                    ]);
    }

    
}

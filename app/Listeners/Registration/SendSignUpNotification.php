<?php

namespace VanguardDK\Listeners\Registration;

use VanguardDK\Events\User\Registered;
use VanguardDK\Notifications\UserRegistered;
use VanguardDK\Repositories\User\UserRepository;

class SendSignUpNotification
{
    /**
     * @var UserRepository
     */
    private $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    /**
     * Handle the event.
     *
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        if (! settings('notifications_signup_email')) {
            return;
        }

        foreach ($this->users->getUsersWithRole('Admin') as $user) {
            $user->notify(new UserRegistered($event->getRegisteredUser()));
        }
    }
}

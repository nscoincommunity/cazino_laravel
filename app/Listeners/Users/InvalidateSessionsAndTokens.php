<?php

namespace VanguardDK\Listeners\Users;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\Guard;
use VanguardDK\Events\User\Banned;
use VanguardDK\Events\User\LoggedIn;
use VanguardDK\Repositories\Session\SessionRepository;
use VanguardDK\Repositories\User\UserRepository;
use VanguardDK\Services\Auth\Api\Token;

class InvalidateSessionsAndTokens
{
    /**
     * @var SessionRepository
     */
    private $sessions;

    public function __construct(SessionRepository $sessions)
    {
        $this->sessions = $sessions;
    }

    /**
     * Handle the event.
     *
     * @param Banned $event
     * @return void
     */
    public function handle(Banned $event)
    {
        $user = $event->getBannedUser();

        $this->sessions->invalidateAllSessionsForUser($user->id);

        Token::where('user_id', $user->id)->delete();
    }
}

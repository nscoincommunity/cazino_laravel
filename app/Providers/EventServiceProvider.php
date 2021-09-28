<?php

namespace VanguardDK\Providers;

use VanguardDK\Events\User\Banned;
use VanguardDK\Events\User\LoggedIn;
use VanguardDK\Events\User\Registered;
use VanguardDK\Listeners\Users\InvalidateSessionsAndTokens;
use VanguardDK\Listeners\Login\UpdateLastLoginTimestamp;
use VanguardDK\Listeners\PermissionEventsSubscriber;
use VanguardDK\Listeners\Registration\SendConfirmationEmail;
use VanguardDK\Listeners\Registration\SendSignUpNotification;
use VanguardDK\Listeners\RoleEventsSubscriber;
use VanguardDK\Listeners\UserEventsSubscriber;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendConfirmationEmail::class,
            SendSignUpNotification::class,
        ],
        LoggedIn::class => [
            UpdateLastLoginTimestamp::class
        ],
        Banned::class => [
            InvalidateSessionsAndTokens::class
        ],
		\SocialiteProviders\Manager\SocialiteWasCalled::class => [
			// add your listeners (aka providers) here
			'SocialiteProviders\\VKontakte\\VKontakteExtendSocialite@handle',
			'SocialiteProviders\\Odnoklassniki\\OdnoklassnikiExtendSocialite@handle',
		],
    ];

    /**
     * The subscriber classes to register.
     *
     * @var array
     */
    protected $subscribe = [
        UserEventsSubscriber::class,
        RoleEventsSubscriber::class,
        PermissionEventsSubscriber::class
    ];

    /**
     * Register any other events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}

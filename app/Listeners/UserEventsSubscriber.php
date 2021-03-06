<?php

namespace VanguardDK\Listeners;

use VanguardDK\Activity;
use VanguardDK\Events\Settings\Updated as SettingsUpdated;
use VanguardDK\Events\User\Banned;
use VanguardDK\Events\User\ChangedAvatar;
use VanguardDK\Events\User\Created;
use VanguardDK\Events\User\Deleted;
use VanguardDK\Events\User\LoggedIn;
use VanguardDK\Events\User\LoggedOut;
use VanguardDK\Events\User\Registered;
use VanguardDK\Events\User\RequestedPasswordResetEmail;
use VanguardDK\Events\User\ResetedPasswordViaEmail;
use VanguardDK\Events\User\TwoFactorDisabled;
use VanguardDK\Events\User\TwoFactorDisabledByAdmin;
use VanguardDK\Events\User\TwoFactorEnabled;
use VanguardDK\Events\User\TwoFactorEnabledByAdmin;
use VanguardDK\Events\User\UpdatedByAdmin;
use VanguardDK\Events\User\UpdatedProfileDetails;
use VanguardDK\Events\User\UserEventContract;
use VanguardDK\Services\Logging\UserActivity\Logger;

class UserEventsSubscriber
{
    /**
     * @var UserActivityLogger
     */
    private $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function onLogin(LoggedIn $event)
    {
        $this->logger->log(trans('log.logged_in'));
    }

    public function onLogout(LoggedOut $event)
    {
        $this->logger->log(trans('log.logged_out'));
    }

    public function onRegister(Registered $event)
    {
        $this->logger->setUser($event->getRegisteredUser());
        $this->logger->log(trans('log.created_account'));
    }

    public function onAvatarChange(ChangedAvatar $event)
    {
        $this->logger->log(trans('log.updated_avatar'));
    }

    public function onProfileDetailsUpdate(UpdatedProfileDetails $event)
    {
        $this->logger->log(trans('log.updated_profile'));
    }

    public function onDelete(Deleted $event)
    {
        $message = trans(
            'log.deleted_user',
            ['name' => $event->getDeletedUser()->present()->nameOrEmail]
        );

        $this->logger->log($message);
    }

    public function onBan(Banned $event)
    {
        $message = trans(
            'log.banned_user',
            ['name' => $event->getBannedUser()->present()->nameOrEmail]
        );

        $this->logger->log($message);
    }

    public function onUpdateByAdmin(UpdatedByAdmin $event)
    {
        $message = trans(
            'log.updated_profile_details_for',
            ['name' => $event->getUpdatedUser()->present()->nameOrEmail]
        );

        $this->logger->log($message);
    }

    public function onCreate(Created $event)
    {
        $message = trans(
            'log.created_account_for',
            ['name' => $event->getCreatedUser()->present()->nameOrEmail]
        );

        $this->logger->log($message);
    }

    public function onSettingsUpdate(SettingsUpdated $event)
    {
        $this->logger->log(trans('log.updated_settings'));
    }

    public function onTwoFactorEnable(TwoFactorEnabled $event)
    {
        $this->logger->log(trans('log.enabled_2fa'));
    }

    public function onTwoFactorDisable(TwoFactorDisabled $event)
    {
        $this->logger->log(trans('log.disabled_2fa'));
    }

    public function onTwoFactorEnableByAdmin(TwoFactorEnabledByAdmin $event)
    {
        $message = trans(
            'log.enabled_2fa_for',
            ['name' => $event->getUser()->present()->nameOrEmail]
        );

        $this->logger->log($message);
    }

    public function onTwoFactorDisableByAdmin(TwoFactorDisabledByAdmin $event)
    {
        $message = trans(
            'log.disabled_2fa_for',
            ['name' => $event->getUser()->present()->nameOrEmail]
        );

        $this->logger->log($message);
    }

    public function onPasswordResetEmailRequest(RequestedPasswordResetEmail $event)
    {
        $this->logger->setUser($event->getUser());
        $this->logger->log(trans('log.requested_password_reset'));
    }

    public function onPasswordReset(ResetedPasswordViaEmail $event)
    {
        $this->logger->setUser($event->getUser());
        $this->logger->log(trans('log.reseted_password'));
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $class = 'VanguardDK\Listeners\UserEventsSubscriber';

        $events->listen(LoggedIn::class, "{$class}@onLogin");
        $events->listen(LoggedOut::class, "{$class}@onLogout");
        $events->listen(Registered::class, "{$class}@onRegister");
        $events->listen(Created::class, "{$class}@onCreate");
        $events->listen(ChangedAvatar::class, "{$class}@onAvatarChange");
        $events->listen(UpdatedProfileDetails::class, "{$class}@onProfileDetailsUpdate");
        $events->listen(UpdatedByAdmin::class, "{$class}@onUpdateByAdmin");
        $events->listen(Deleted::class, "{$class}@onDelete");
        $events->listen(Banned::class, "{$class}@onBan");
        $events->listen(SettingsUpdated::class, "{$class}@onSettingsUpdate");
        $events->listen(TwoFactorEnabled::class, "{$class}@onTwoFactorEnable");
        $events->listen(TwoFactorDisabled::class, "{$class}@onTwoFactorDisable");
        $events->listen(TwoFactorEnabledByAdmin::class, "{$class}@onTwoFactorEnableByAdmin");
        $events->listen(TwoFactorDisabledByAdmin::class, "{$class}@onTwoFactorDisableByAdmin");
        $events->listen(RequestedPasswordResetEmail::class, "{$class}@onPasswordResetEmailRequest");
        $events->listen(ResetedPasswordViaEmail::class, "{$class}@onPasswordReset");
    }
}

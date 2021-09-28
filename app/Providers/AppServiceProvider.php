<?php

namespace VanguardDK\Providers;

use Carbon\Carbon;
use VanguardDK\Repositories\Activity\ActivityRepository;
use VanguardDK\Repositories\Activity\EloquentActivity;
use VanguardDK\Repositories\Country\CountryRepository;
use VanguardDK\Repositories\Country\EloquentCountry;
use VanguardDK\Repositories\Permission\EloquentPermission;
use VanguardDK\Repositories\Permission\PermissionRepository;
use VanguardDK\Repositories\Role\EloquentRole;
use VanguardDK\Repositories\Role\RoleRepository;
use VanguardDK\Repositories\Session\DbSession;
use VanguardDK\Repositories\Session\SessionRepository;
use VanguardDK\Repositories\User\EloquentUser;
use VanguardDK\Repositories\User\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Carbon::setLocale(config('app.locale'));
        config(['app.name' => settings('app_name')]);
        \Illuminate\Database\Schema\Builder::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserRepository::class, EloquentUser::class);
        $this->app->singleton(ActivityRepository::class, EloquentActivity::class);
        $this->app->singleton(RoleRepository::class, EloquentRole::class);
        $this->app->singleton(PermissionRepository::class, EloquentPermission::class);
        $this->app->singleton(SessionRepository::class, DbSession::class);
        $this->app->singleton(CountryRepository::class, EloquentCountry::class);

        if ($this->app->environment('local')) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
        }
    }
}

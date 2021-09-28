<?php

namespace VanguardDK\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \VanguardDK\Http\Middleware\VerifyInstallation::class,
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \VanguardDK\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        \VanguardDK\Http\Middleware\TrustProxies::class,
    ];
    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \VanguardDK\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \VanguardDK\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \VanguardDK\Http\Middleware\SetLanguage::class,
        ],
        'api' => [
            \VanguardDK\Http\Middleware\UseApiGuard::class,
            'throttle:60,1',
            'bindings'
        ],
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \VanguardDK\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'guest' => \VanguardDK\Http\Middleware\RedirectIfAuthenticated::class,
        'registration' => \VanguardDK\Http\Middleware\Registration::class,
        'social.login' => \VanguardDK\Http\Middleware\SocialLogin::class,
        //'role' => \VanguardDK\Http\Middleware\CheckRole::class,
        //'permission' => \VanguardDK\Http\Middleware\CheckPermissions::class,        
        //'can' => \Illuminate\Auth\Middleware\Authorize::class,
		'session.database' => \VanguardDK\Http\Middleware\DatabaseSession::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
		'role' => \jeremykenedy\LaravelRoles\Middleware\VerifyRole::class,
		'permission' => \jeremykenedy\LaravelRoles\Middleware\VerifyPermission::class,
		'level' => \jeremykenedy\LaravelRoles\Middleware\VerifyLevel::class,
    ];
}

<?php


Route::namespace('Frontend')->group(function () {
	/*
	Route::get('login', [
		'as' => 'frontend.auth.login',
		'uses' => 'Auth\AuthController@getLogin'
	]);
*/	
	Route::get('launcher/{game}/{token}/{mode}','Auth\AuthController@apiLogin' );
	
	
	Route::post('login', [
		'as' => 'frontend.auth.login.post',
		'uses' => 'Auth\AuthController@postLogin'
	]);	
	Route::get('logout', [
		'as' => 'frontend.auth.logout',
		'uses' => 'Auth\AuthController@getLogout'
	]);
	
	// Allow registration routes only if registration is enabled.
	if (settings('reg_enabled')) {
		/*
		Route::get('register', [
			'as' => 'frontend.register',
			'uses' => 'Auth\AuthController@getRegister'
		]);
		*/
		Route::post('register', [
			'as' => 'frontend.register.post',
			'uses' => 'Auth\AuthController@postRegister'
		]);		
		Route::get('register/confirmation/{token}', [
			'as' => 'frontend.register.confirm-email',
			'uses' => 'Auth\AuthController@confirmEmail'
		]);
	}
	
	/**
	 * Social Login
	 */
	 
	
	Route::get('auth/{provider}/login', [
		'as' => 'frontend.social.login',
		'uses' => 'Auth\SocialAuthController@redirectToProvider',
		//'middleware' => 'social.login'
	]);	
	Route::get('auth/{provider}/callback', [
		'as' => 'frontend.social.callback',
		'uses' => 'Auth\SocialAuthController@handleProviderCallback',
	]);
	Route::post('auth/{provider}/callback', [
		'as' => 'frontend.social.callback.post',
		'uses' => 'Auth\SocialAuthController@handleProviderCallback',
	]);
	/*
	Route::get('auth/twitter/email', [
		'as' => 'frontend.social.twitter',
		'uses' => 'Auth\SocialAuthController@getTwitterEmail',
	]);
	Route::post('auth/twitter/email', [
		'as' => 'frontend.social.twitter.post',
		'uses' => 'Auth\SocialAuthController@postTwitterEmail',
	]);
	*/
	/*
	Route::post('auth/social', [
		'as' => 'frontend.auth.social',
		'uses' => 'Auth\SocialAuthController@postSocial',
	]);
	*/

	if (settings('forgot_password')) {	
		/*
		Route::get('password/remind', [
			'as' => 'frontend.password.remind',
			'uses' => 'Auth\PasswordController@forgotPassword'
		]);
		*/
		Route::post('password/remind', [
			'as' => 'frontend.password.remind.post',
			'uses' => 'Auth\PasswordController@sendPasswordReminder'
		]);				
		Route::get('password/reset/{token}', [
			'as' => 'frontend.password.reset',
			'uses' => 'Auth\PasswordController@getReset'
		]);		
		Route::post('password/reset', [
			'as' => 'frontend.password.reset.post',
			'uses' => 'Auth\PasswordController@postReset'
		]);
	}
	
	if (settings('2fa.enabled')) {
		Route::get('auth/two-factor-authentication', [
			'as' => 'frontend.auth.token',
			'uses' => 'Auth\AuthController@getToken'
		]);

		Route::post('auth/two-factor-authentication', [
			'as' => 'frontend.auth.token.validate',
			'uses' => 'Auth\AuthController@postToken'
		]);
	}
	
	Route::get('new-license', [
        'as' => 'frontend.new_license',
        'uses' => 'PagesController@new_license'
    ]);
	Route::post('new-license', [
        'as' => 'frontend.new_license.post',
        'uses' => 'PagesController@new_license_post'
    ]);
	
	Route::get('license-error', [
        'as' => 'frontend.page.error_license',
        'uses' => 'PagesController@error_license'
    ]);
	
	/**
     * Dashboard
     */

    
	Route::get('statistics', [
        'as' => 'frontend.statistics',
        'uses' => 'DashboardController@statistics'
    ]);
	
	/**
     * User Profile
     */

    Route::get('profile', [
        'as' => 'frontend.profile',
        'uses' => 'ProfileController@index'
    ]);
    Route::get('profile/activity', [
        'as' => 'frontend.profile.activity',
        'uses' => 'ProfileController@activity'
    ]);
	Route::get('profile/balance', [
        'as' => 'frontend.profile.balance',
        'uses' => 'ProfileController@balance'
    ]);
	Route::post('profile/balance', [
        'as' => 'frontend.profile.balance.post',
        'uses' => 'ProfileController@balanceAdd'
    ]);
	Route::get('profile/balance/success', [
        'as' => 'frontend.profile.balance.success',
        'uses' => 'ProfileController@success'
    ]);
	Route::get('profile/balance/fail', [
        'as' => 'frontend.profile.balance.fail',
        'uses' => 'ProfileController@fail'
    ]);
    Route::post('profile/details/update', [
        'as' => 'frontend.profile.update.details',
        'uses' => 'ProfileController@updateDetails'
    ]);
	Route::post('profile/password/update', [
        'as' => 'frontend.profile.update.password',
        'uses' => 'ProfileController@updatePassword'
    ]);
    Route::post('profile/avatar/update', [
        'as' => 'frontend.profile.update.avatar',
        'uses' => 'ProfileController@updateAvatar'
    ]);
    Route::post('profile/avatar/update/external', [
        'as' => 'frontend.profile.update.avatar-external',
        'uses' => 'ProfileController@updateAvatarExternal'
    ]);
	
	Route::post('profile/exchange', [
        'as' => 'frontend.profile.exchange',
        'uses' => 'ProfileController@exchange'
    ]);
	
    Route::put('profile/login-details/update', [
        'as' => 'frontend.profile.update.login-details',
        'uses' => 'ProfileController@updateLoginDetails'
    ]);
    Route::post('profile/two-factor/enable', [
        'as' => 'frontend.profile.two-factor.enable',
        'uses' => 'ProfileController@enableTwoFactorAuth'
    ]);
    Route::post('profile/two-factor/disable', [
        'as' => 'frontend.profile.two-factor.disable',
        'uses' => 'ProfileController@disableTwoFactorAuth'
    ]);
    Route::get('profile/sessions', [
        'as' => 'frontend.profile.sessions',
        'uses' => 'ProfileController@sessions'
    ]);
    Route::delete('profile/sessions/{session}/invalidate', [
        'as' => 'frontend.profile.sessions.invalidate',
        'uses' => 'ProfileController@invalidateSession'
    ]);
	
	Route::get('profile/returns', [
        'as' => 'frontend.profile.returns',
        'uses' => 'ProfileController@returns'
    ]);
			
	
	/**
     * Games routes
    */

	Route::get('/', [
        'as' => 'frontend.game.list',
        'uses' => 'GamesController@index'
    ]);

	/** @TODO solution for registration */
    Route::get('/user', [
        'as' => 'frontend.user.show',
        'uses' => 'GamesController@index'
    ]);

	Route::get('/search', [
        'as' => 'frontend.game.search',
        'uses' => 'GamesController@search'
    ]);
	/*
	Route::get('games', [
        'as' => 'frontend.game.list',
        'uses' => 'GamesController@index'
    ]);	
	*/
	
	Route::get('categories/{category1}', [
        'as' => 'frontend.game.list.category',
        'uses' => 'GamesController@index'
    ]);
	
	Route::get('categories/{category1}/{category2}', [
        'as' => 'frontend.game.list.category_level2',
        'uses' => 'GamesController@index'
    ]);
    
	Route::get('game/{game}', [
        'as' => 'frontend.game.go',
        'uses' => 'GamesController@go'
    ]);	
	Route::post('game/{game}/server', [
        'as' => 'frontend.game.server',
        'uses' => 'GamesController@server'
    ]);    
	Route::get('/game_stat', [
        'as' => 'frontend.game_stat',
        'uses' => 'GamesController@game_stat'
    ]);
	
	Route::prefix('payment')->group(function () { 
		Route::post('/piastrix/result', [
			'as' => 'payment.piastrix.result',
			'uses' => 'PaymentController@piastrix'
		]);

        Route::get('/freekassa/success', [
            'as' => 'payment.freekassa.success',
            'uses' => 'FreeKassaPaymentController@success'
        ]);

        Route::get('/freekassa/error', [
            'as' => 'payment.freekassa.error',
            'uses' => 'FreeKassaPaymentController@error'
        ]);

        Route::post('/addtask', [
            'as' => 'frontend.payment.addtask.post',
            'uses' => 'PaymentSystemController@addTask'
        ]);
	});
	
});

/**
*
*
*
******************* BACKEND
*
*
*
*/


Route::prefix('backend')->group(function () {
	Route::namespace('Backend')->group(function () {

	Route::get('login', [
		'as' => 'backend.auth.login',
		'uses' => 'Auth\AuthController@getLogin'
	]);	
	Route::post('login', [
		'as' => 'backend.auth.login.post',
		'uses' => 'Auth\AuthController@postLogin'
	]);	
	Route::get('logout', [
		'as' => 'backend.auth.logout',
		'uses' => 'Auth\AuthController@getLogout'
	]);


	if (settings('forgot_password')) {		
		Route::get('password/remind', [
			'as' => 'backend.password.remind',
			'uses' => 'Auth\PasswordController@forgotPassword'
		]);		
		Route::post('password/remind', [
			'as' => 'backend.password.remind.post',
			'uses' => 'Auth\PasswordController@sendPasswordReminder'
		]);				
		Route::get('password/reset/{token}', [
			'as' => 'backend.password.reset',
			'uses' => 'Auth\PasswordController@getReset'
		]);		
		Route::post('password/reset', [
			'as' => 'backend.password.reset.post',
			'uses' => 'Auth\PasswordController@postReset'
		]);
	}
	
	if (settings('2fa.enabled')) {
		Route::get('auth/two-factor-authentication', [
			'as' => 'backend.auth.token',
			'uses' => 'Auth\AuthController@getToken'
		]);

		Route::post('auth/two-factor-authentication', [
			'as' => 'backend.auth.token.validate',
			'uses' => 'Auth\AuthController@postToken'
		]);
	}	
	
	
    /**
     * Dashboard
     */

    Route::get('/', [
        'as' => 'backend.dashboard',
        'uses' => 'DashboardController@index'
    ]);
	Route::get('/game_stat', [
        'as' => 'backend.game_stat',
        'uses' => 'DashboardController@game_stat'
    ]);
	
    /**
     * User Profile
     */

    Route::get('profile', [
        'as' => 'backend.profile',
        'uses' => 'ProfileController@index'
    ]);
    Route::get('profile/activity', [
        'as' => 'backend.profile.activity',
        'uses' => 'ProfileController@activity'
    ]);
    Route::put('profile/details/update', [
        'as' => 'backend.profile.update.details',
        'uses' => 'ProfileController@updateDetails'
    ]);
    Route::post('profile/avatar/update', [
        'as' => 'backend.profile.update.avatar',
        'uses' => 'ProfileController@updateAvatar'
    ]);
    Route::post('profile/avatar/update/external', [
        'as' => 'backend.profile.update.avatar-external',
        'uses' => 'ProfileController@updateAvatarExternal'
    ]);
    Route::put('profile/login-details/update', [
        'as' => 'backend.profile.update.login-details',
        'uses' => 'ProfileController@updateLoginDetails'
    ]);
    Route::post('profile/two-factor/enable', [
        'as' => 'backend.profile.two-factor.enable',
        'uses' => 'ProfileController@enableTwoFactorAuth'
    ]);
    Route::post('profile/two-factor/disable', [
        'as' => 'backend.profile.two-factor.disable',
        'uses' => 'ProfileController@disableTwoFactorAuth'
    ]);
    Route::get('profile/sessions', [
        'as' => 'backend.profile.sessions',
        'uses' => 'ProfileController@sessions'
    ]);
    Route::delete('profile/sessions/{session}/invalidate', [
        'as' => 'backend.profile.sessions.invalidate',
        'uses' => 'ProfileController@invalidateSession'
    ]);

    /**
     * User Management
    */
	
    Route::get('user', [
        'as' => 'backend.user.list',
        'uses' => 'UsersController@index'
    ]);	
	Route::get('statistics', [
        'as' => 'backend.statistics',
        'uses' => 'DashboardController@statistics'
    ]);	
	Route::post('profile/balance/update', [
        'uses' => 'UsersController@updateBalance',
		'as' => 'backend.user.balance.update',
		'middleware' => 'permission:users.balance.manage'
    ]);	
	Route::get('user/{user}/stat', [
        'as' => 'backend.user.stat',
        'uses' => 'UsersController@statistics'
    ]);
    Route::get('user/create', [
        'as' => 'backend.user.create',
        'uses' => 'UsersController@create'
    ]);
    Route::post('user/create', [
        'as' => 'backend.user.store',
        'uses' => 'UsersController@store'
    ]);
    Route::get('user/{user}/show', [
        'as' => 'backend.user.show',
        'uses' => 'UsersController@view'
    ]);
    Route::get('user/{user}/edit', [
        'as' => 'backend.user.edit',
        'uses' => 'UsersController@edit'
    ]);
    Route::put('user/{user}/update/details', [
        'as' => 'backend.user.update.details',
        'uses' => 'UsersController@updateDetails'
    ]);
    Route::put('user/{user}/update/login-details', [
        'as' => 'backend.user.update.login-details',
        'uses' => 'UsersController@updateLoginDetails'
    ]);
    Route::delete('user/{user}/delete', [
        'as' => 'backend.user.delete',
        'uses' => 'UsersController@delete',
		'middleware' => 'permission:users.delete'
    ]);
    Route::post('user/{user}/update/avatar', [
        'as' => 'backend.user.update.avatar',
        'uses' => 'UsersController@updateAvatar'
    ]);
    Route::post('user/{user}/update/avatar/external', [
        'as' => 'backend.user.update.avatar.external',
        'uses' => 'UsersController@updateAvatarExternal'
    ]);
    Route::get('user/{user}/sessions', [
        'as' => 'backend.user.sessions',
        'uses' => 'UsersController@sessions'
    ]);
    Route::delete('user/{user}/sessions/{session}/invalidate', [
        'as' => 'backend.user.sessions.invalidate',
        'uses' => 'UsersController@invalidateSession'
    ]);
    Route::post('user/{user}/two-factor/enable', [
        'as' => 'backend.user.two-factor.enable',
        'uses' => 'UsersController@enableTwoFactorAuth'
    ]);
    Route::post('user/{user}/two-factor/disable', [
        'as' => 'backend.user.two-factor.disable',
        'uses' => 'UsersController@disableTwoFactorAuth'
    ]);
	
	/**
     * Games routes
    */

	Route::get('game', [
        'as' => 'backend.game.list',
        'uses' => 'GamesController@index'
    ]);	
    Route::get('game/create', [
        'as' => 'backend.game.create',		
        'uses' => 'GamesController@create',
    ]);
    Route::post('game/create', [
        'as' => 'backend.game.store',		
        'uses' => 'GamesController@store',
    ]);
    Route::get('game/{game}/show', [
        'as' => 'backend.game.show',		
        'uses' => 'GamesController@view',
    ]);	
	Route::get('game/{game}', [
        'as' => 'backend.game.go',
        'uses' => 'GamesController@go'
    ]);	
	Route::post('/game/{game}/server', [
        'as' => 'backend.game.server',
        'uses' => 'GamesController@server'
    ]);
    Route::get('game/{game}/edit', [
        'as' => 'backend.game.edit',		
        'uses' => 'GamesController@edit',
    ]);	
	Route::post('game/{game}/update', [
        'as' => 'backend.game.update',		
        'uses' => 'GamesController@update',
    ]);	
	Route::delete('game/{game}/delete', [
        'as' => 'backend.game.delete',		
        'uses' => 'GamesController@delete',
    ]);	
	Route::post('game/categories', [
        'as' => 'backend.game.categories',		
        'uses' => 'GamesController@categories',
    ]);	
	
	
	/**
     * Categories routes
     */

	Route::get('category', [
        'as' => 'backend.category.list',
        'uses' => 'CategoriesController@index'
    ]);	
    Route::get('category/create', [
        'as' => 'backend.category.create',		
        'uses' => 'CategoriesController@create',
    ]);
    Route::post('category/create', [
        'as' => 'backend.category.store',		
        'uses' => 'CategoriesController@store',
    ]);    
    Route::get('category/{category}/edit', [
        'as' => 'backend.category.edit',		
        'uses' => 'CategoriesController@edit',
    ]);	
	Route::post('category/{category}/update', [
        'as' => 'backend.category.update',		
        'uses' => 'CategoriesController@update',
    ]);	
	Route::delete('category/{category}/delete', [
        'as' => 'backend.category.delete',		
        'uses' => 'CategoriesController@delete',
    ]);
	
	/**
     * Points routes
     */

	Route::get('points', [
        'as' => 'backend.points.list',
        'uses' => 'PointsController@index'
    ]);	
    Route::get('points/create', [
        'as' => 'backend.points.create',		
        'uses' => 'PointsController@create',
    ]);
    Route::post('points/create', [
        'as' => 'backend.points.store',		
        'uses' => 'PointsController@store',
    ]);    
    Route::get('points/{points}/edit', [
        'as' => 'backend.points.edit',		
        'uses' => 'PointsController@edit',
    ]);	
	Route::post('points/{points}/update', [
        'as' => 'backend.points.update',		
        'uses' => 'PointsController@update',
    ]);	
	Route::delete('points/{points}/delete', [
        'as' => 'backend.points.delete',		
        'uses' => 'PointsController@delete',
    ]);
	
	/**
     * Return routes
     */

	Route::get('returns', [
        'as' => 'backend.returns.list',
        'uses' => 'ReturnsController@index'
    ]);	
    Route::get('returns/create', [
        'as' => 'backend.returns.create',		
        'uses' => 'ReturnsController@create',
    ]);
    Route::post('returns/create', [
        'as' => 'backend.returns.store',		
        'uses' => 'ReturnsController@store',
    ]);    
    Route::get('returns/{return}/edit', [
        'as' => 'backend.returns.edit',		
        'uses' => 'ReturnsController@edit',
    ]);	
	Route::post('returns/{return}/update', [
        'as' => 'backend.returns.update',		
        'uses' => 'ReturnsController@update',
    ]);	
	Route::delete('returns/{return}/delete', [
        'as' => 'backend.returns.delete',		
        'uses' => 'ReturnsController@delete',
    ]);
	
	/**
     * Pages routes
     */

	Route::get('pages', [
        'as' => 'backend.pages.list',
        'uses' => 'PagesController@index'
    ]);	
    Route::get('pages/create', [
        'as' => 'backend.pages.create',		
        'uses' => 'PagesController@create',
    ]);
    Route::post('pages/create', [
        'as' => 'backend.pages.store',		
        'uses' => 'PagesController@store',
    ]);    
    Route::get('pages/{page}/edit', [
        'as' => 'backend.pages.edit',		
        'uses' => 'PagesController@edit',
    ]);	
	Route::post('pages/{page}/update', [
        'as' => 'backend.pages.update',		
        'uses' => 'PagesController@update',
    ]);	
	Route::delete('pages/{page}/delete', [
        'as' => 'backend.pages.delete',		
        'uses' => 'PagesController@delete',
    ]);
	
	
	/**
     * Jackpots routes
     */

	Route::get('jackpot', [
        'as' => 'backend.jackpot.list',
        'uses' => 'JackpotsController@index'
    ]);	
    Route::get('jackpot/create', [
        'as' => 'backend.jackpot.create',		
        'uses' => 'JackpotsController@create',
    ]);
    Route::post('jackpot/create', [
        'as' => 'backend.jackpot.store',		
        'uses' => 'JackpotsController@store',
    ]);    
    Route::get('jackpot/{jackpot}/edit', [
        'as' => 'backend.jackpot.edit',		
        'uses' => 'JackpotsController@edit',
    ]);	
	Route::post('jackpot/{jackpot}/update', [
        'as' => 'backend.jackpot.update',		
        'uses' => 'JackpotsController@update',
    ]);	
	Route::post('jackpot/balance', [
        'as' => 'backend.jackpot.balance',		
        'uses' => 'JackpotsController@balance',
    ]);	
	Route::delete('jackpot/{jackpot}/delete', [
        'as' => 'backend.jackpot.delete',		
        'uses' => 'JackpotsController@delete',
    ]);

    /**
     * Roles & Permissions
     */

    Route::get('role', [
        'as' => 'backend.role.index',
        'uses' => 'RolesController@index'
    ]);
    Route::get('role/create', [
        'as' => 'backend.role.create',
        'uses' => 'RolesController@create'
    ]);
    Route::post('role/store', [
        'as' => 'backend.role.store',
        'uses' => 'RolesController@store'
    ]);
    Route::get('role/{role}/edit', [
        'as' => 'backend.role.edit',
        'uses' => 'RolesController@edit'
    ]);
    Route::put('role/{role}/update', [
        'as' => 'backend.role.update',
        'uses' => 'RolesController@update'
    ]);
    Route::delete('role/{role}/delete', [
        'as' => 'backend.role.delete',
        'uses' => 'RolesController@delete'
    ]);	
	
    Route::post('permission/save', [
        'as' => 'backend.permission.save',
        'uses' => 'PermissionsController@saveRolePermissions'
    ]);
	
	/**
     * Permissions
     */
	 
	Route::get('permission', [
        'as' => 'backend.permission.index',
        'uses' => 'PermissionsController@index'
    ]);
    Route::get('permission/create', [
        'as' => 'backend.permission.create',
        'uses' => 'PermissionsController@create'
    ]);
    Route::post('permission/store', [
        'as' => 'backend.permission.store',
        'uses' => 'PermissionsController@store'
    ]);
    Route::get('permission/{permission}/edit', [
        'as' => 'backend.permission.edit',
        'uses' => 'PermissionsController@edit'
    ]);
    Route::put('permission/{permission}/update', [
        'as' => 'backend.permission.update',
        'uses' => 'PermissionsController@update'
    ]);
    Route::delete('permission/{permission}/delete', [
        'as' => 'backend.permission.delete',
        'uses' => 'PermissionsController@delete'
    ]);	
	

    /**
     * Settings
     */

    Route::get('settings', [
        'as' => 'backend.settings.general',
        'uses' => 'SettingsController@general',
        'middleware' => 'permission:settings.general'
    ]);
	Route::get('settings/bots', [
        'as' => 'backend.settings.bots',
        'uses' => 'SettingsController@bots',
        'middleware' => 'permission:settings.general'
    ]);
    Route::post('settings/general', [
        'as' => 'backend.settings.general.update',
        'uses' => 'SettingsController@update',
        'middleware' => 'permission:settings.general'
    ]);
    Route::get('settings/auth', [
        'as' => 'backend.settings.auth',
        'uses' => 'SettingsController@auth',
        'middleware' => 'permission:settings.auth'
    ]);
    Route::post('settings/auth', [
        'as' => 'backend.settings.auth.update',
        'uses' => 'SettingsController@update',
        'middleware' => 'permission:settings.auth'
    ]);
	// Only allow managing 2FA if AUTHY_KEY is defined inside .env file
    if (env('AUTHY_KEY')) {
        Route::post('settings/auth/2fa/enable', [
            'as' => 'backend.settings.auth.2fa.enable',
            'uses' => 'SettingsController@enableTwoFactor',
            'middleware' => 'permission:settings.auth'
        ]);
        Route::post('settings/auth/2fa/disable', [
            'as' => 'backend.settings.auth.2fa.disable',
            'uses' => 'SettingsController@disableTwoFactor',
            'middleware' => 'permission:settings.auth'
        ]);
    }

    Route::post('settings/auth/registration/captcha/enable', [
        'as' => 'backend.settings.registration.captcha.enable',
        'uses' => 'SettingsController@enableCaptcha',
        'middleware' => 'permission:settings.auth'
    ]);
    Route::post('settings/auth/registration/captcha/disable', [
        'as' => 'backend.settings.registration.captcha.disable',
        'uses' => 'SettingsController@disableCaptcha',
        'middleware' => 'permission:settings.auth'
    ]);
    Route::get('settings/notifications', [
        'as' => 'backend.settings.notifications',
        'uses' => 'SettingsController@notifications',
        'middleware' => 'permission:settings.notifications'
    ]);
    Route::post('settings/notifications', [
        'as' => 'backend.settings.notifications.update',
        'uses' => 'SettingsController@update',
        'middleware' => 'permission:settings.notifications'
    ]);

    Route::get('payment_system/free_kassa', [
        'as' => 'backend.payment.system.freekassa',
        'uses' => 'PaymentSystemController@freeKassa',
        'middleware' => 'permission:settings.auth'
    ]);

    Route::get('payment_system/give_money_settings', [
        'as' => 'backend.payment.system.givemoney.get',
        'uses' => 'PaymentSystemController@giveMoneySettings',
        'middleware' => 'permission:settings.auth'
    ]);


    Route::post('payment_system', [
        'as' => 'backend.payment.system.update',
        'uses' => 'PaymentSystemController@update',
        'middleware' => 'permission:settings.auth'
    ]);

    Route::get('payment_system/give_money_tasks', [
        'as' => 'backend.payment.system.givemoneytasks.get',
        'uses' => 'PaymentTaskController@giveMoneyTasks',
        'middleware' => 'permission:settings.auth'
    ]);

    Route::post('payment_task', [
        'as' => 'backend.payment.task.update',
        'uses' => 'PaymentTaskController@update',
        'middleware' => 'permission:settings.auth'
    ]);

    /**
     * Activity Log
     */

    Route::get('activity', [
        'as' => 'backend.activity.index',
        'uses' => 'ActivityController@index'
    ]);
    Route::get('activity/user/{user}/log', [
        'as' => 'backend.activity.user',
        'uses' => 'ActivityController@userActivity'
    ]);

	});
});



Route::namespace('Frontend')->group(function () {
	
	Route::get('points', [
        'as' => 'frontend.points',
        'uses' => 'PagesController@points'
    ]);
	
	Route::get('{page}', [
        'as' => 'frontend.page.view',
        'uses' => 'PagesController@view'
    ]);
	
	
	
});
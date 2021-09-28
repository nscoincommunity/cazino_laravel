<nav class="col-md-2 sidebar">
    <div class="user-box text-center pt-5 pb-3">
        <div class="user-img">
            <img src="<?php echo e(auth()->user()->present()->avatar); ?>"
                 width="90"
                 height="90"
                 alt="user-img"
                 class="rounded-circle img-thumbnail img-responsive">
        </div>
        <h5 class="my-3">
            <a href="/game">Balance: <?php echo e(auth()->user()->present()->balance); ?> USD</a>
        </h5>

        <ul class="list-inline mb-2">
            <li class="list-inline-item">
                <a href="<?php echo e(route('backend.profile')); ?>" title="<?php echo app('translator')->getFromJson('app.my_profile'); ?>">
                    <i class="fas fa-cog"></i>
                </a>
            </li>

            <li class="list-inline-item">
                <a href="<?php echo e(route('backend.auth.logout')); ?>" class="text-custom" title="<?php echo app('translator')->getFromJson('app.logout'); ?>">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </li>
        </ul>
    </div>

    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('backend') ? 'active' : ''); ?>" href="<?php echo e(route('backend.dashboard')); ?>">
                    <i class="fas fa-home"></i>
                    <span><?php echo app('translator')->getFromJson('app.dashboard'); ?></span>
                </a>
            </li>

			<?php if (\Auth::user()->hasPermission('users.manage')) : ?>
            <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('backend/user*') ? 'active' : ''); ?>" href="<?php echo e(route('backend.user.list')); ?>">
                    <i class="fas fa-users"></i>
                    <span><?php echo app('translator')->getFromJson('app.users'); ?></span>
                </a>
            </li>
			<?php endif; ?>
			
			<?php if (\Auth::user()->hasPermission('categories.manage')) : ?>
            <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('backend/category*') ? 'active' : ''); ?>" href="<?php echo e(route('backend.category.list')); ?>">
                    <i class="fas fa-server"></i>
                    <span><?php echo app('translator')->getFromJson('app.categories'); ?></span>
                </a>
            </li>
			<?php endif; ?>
			
			<li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('backend/pages*') ? 'active' : ''); ?>" href="<?php echo e(route('backend.pages.list')); ?>">
                    <i class="fas fa-server"></i>
                    <span><?php echo app('translator')->getFromJson('app.pages'); ?></span>
                </a>
            </li>
			
			<li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('backend/points*') ? 'active' : ''); ?>" href="<?php echo e(route('backend.points.list')); ?>">
                    <i class="fas fa-server"></i>
                    <span><?php echo app('translator')->getFromJson('app.points'); ?></span>
                </a>
            </li>
			
			<li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('backend/returns*') ? 'active' : ''); ?>" href="<?php echo e(route('backend.returns.list')); ?>">
                    <i class="fas fa-server"></i>
                    <span><?php echo app('translator')->getFromJson('app.returns'); ?></span>
                </a>
            </li>
			
			<?php if (\Auth::user()->hasPermission('jackpots.manage')) : ?>
            <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('backend/jackpot*') ? 'active' : ''); ?>" href="<?php echo e(route('backend.jackpot.list')); ?>">
                    <i class="fas fa-server"></i>
                    <span><?php echo app('translator')->getFromJson('app.jackpots'); ?></span>
                </a>
            </li>
			<?php endif; ?>
			
			<?php if (\Auth::user()->hasPermission('games.manage')) : ?>
			<li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('backend/game') ? 'active' : ''); ?>" href="<?php echo e(route('backend.game.list')); ?>">
                    <i class="fas fa-server"></i>
                    <span><?php echo app('translator')->getFromJson('app.games'); ?></span>
                </a>
            </li>
			<?php endif; ?>
			
			<li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('backend/statistics*') ? 'active' : ''); ?>" href="<?php echo e(route('backend.statistics')); ?>">
                    <i class="fas fa-server"></i>
                    <span><?php echo app('translator')->getFromJson('app.statistics'); ?></span>
                </a>
            </li>
			
			<li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('backend/game_stat') ? 'active' : ''); ?>" href="<?php echo e(route('backend.game_stat')); ?>">
                    <i class="fas fa-server"></i>
                    <span><?php echo app('translator')->getFromJson('app.game_stat'); ?></span>
                </a>
            </li>

			<?php if (\Auth::user()->hasPermission('users.activity')) : ?>
            <li class="nav-item">
                <a class="nav-link <?php echo e(Request::is('backend/activity*') ? 'active' : ''); ?>" href="<?php echo e(route('backend.activity.index')); ?>">
                    <i class="fas fa-server"></i>
                    <span><?php echo app('translator')->getFromJson('app.activity_log'); ?></span>
                </a>
            </li>
			<?php endif; ?>

            <li class="nav-item">
                <a href="#payment-system-settings-dropdown"
                   class="nav-link"
                   data-toggle="collapse"
                   aria-expanded="<?php echo e(Request::is('backend/settings*') ? 'true' : 'false'); ?>">
                    <i class="fas fa-server"></i>
                    <span><?php echo app('translator')->getFromJson('app.payment_system'); ?></span>
                </a>
                <ul class="<?php echo e(Request::is('backend/payment_system*') ? '' : 'collapse'); ?> list-unstyled sub-menu"
                    id="payment-system-settings-dropdown">
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(Request::is('backend/payment_system/free_kassa') ? 'active' : ''); ?>"
                           href="<?php echo e(route('backend.payment.system.freekassa')); ?>">
                            Free Kassa
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(Request::is('backend/payment_system/give_money_settings') ? 'active' : ''); ?>"
                           href="<?php echo e(route('backend.payment.system.givemoney.get')); ?>">
                            Настройки вывода
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(Request::is('backend/payment_system/give_money_tasks') ? 'active' : ''); ?>"
                           href="<?php echo e(route('backend.payment.system.givemoneytasks.get')); ?>">
                            Запросы вывода
                        </a>
                    </li>
                </ul>
            </li>
			
			<?php if (\Auth::user()->hasPermission('roles.manage|permissions.manage')) : ?>
            <li class="nav-item">
                <a href="#roles-dropdown"
                   class="nav-link"
                   data-toggle="collapse"
                   aria-expanded="<?php echo e(Request::is('backend/role*') || Request::is('backend/permission*') ? 'true' : 'false'); ?>">
                    <i class="fas fa-users-cog"></i>
                    <span><?php echo app('translator')->getFromJson('app.roles_and_permissions'); ?></span>
                </a>
                <ul class="<?php echo e(Request::is('backend/role*') || Request::is('backend/permission*') ? '' : 'collapse'); ?> list-unstyled sub-menu" id="roles-dropdown">
					<?php if (\Auth::user()->hasPermission('roles.manage')) : ?>
					<li class="nav-item">
                        <a class="nav-link <?php echo e(Request::is('backend/role*') ? 'active' : ''); ?>"
                           href="<?php echo e(route('backend.role.index')); ?>"><?php echo app('translator')->getFromJson('app.roles'); ?></a>
                    </li>
					<?php endif; ?>
					<?php if (\Auth::user()->hasPermission('permissions.manage')) : ?>
					<li class="nav-item">
						<a class="nav-link <?php echo e(Request::is('backend/permission*') ? 'active' : ''); ?>"
                           href="<?php echo e(route('backend.permission.index')); ?>"><?php echo app('translator')->getFromJson('app.permissions'); ?></a>
                    </li>
                    <?php endif; ?>
                </ul>
            </li>
			<?php endif; ?>

			<?php if (\Auth::user()->hasPermission('settings.general|settings.auth|settings.notifications')) : ?>
            <li class="nav-item">
                <a href="#settings-dropdown"
                   class="nav-link"
                   data-toggle="collapse"
                   aria-expanded="<?php echo e(Request::is('backend/settings*') ? 'true' : 'false'); ?>">
                    <i class="fas fa-cogs"></i>
                    <span><?php echo app('translator')->getFromJson('app.settings'); ?></span>
                </a>
                <ul class="<?php echo e(Request::is('backend/settings*') ? '' : 'collapse'); ?> list-unstyled sub-menu"
                    id="settings-dropdown">

					<?php if (\Auth::user()->hasPermission('settings.general')) : ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(Request::is('backend/settings') ? 'active' : ''); ?>"
                           href="<?php echo e(route('backend.settings.general')); ?>">
                            <?php echo app('translator')->getFromJson('app.general'); ?>
                        </a>
                    </li>
					<?php endif; ?>
					
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(Request::is('backend/bots') ? 'active' : ''); ?>"
                           href="<?php echo e(route('backend.settings.bots')); ?>">
                            <?php echo app('translator')->getFromJson('app.bots'); ?>
                        </a>
                    </li>
					
					<?php if (\Auth::user()->hasPermission('settings.auth')) : ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(Request::is('backend/settings/auth*') ? 'active' : ''); ?>"
                           href="<?php echo e(route('backend.settings.auth')); ?>"><?php echo app('translator')->getFromJson('app.auth_and_registration'); ?></a>
                    </li>
					<?php endif; ?>
					
					<?php if (\Auth::user()->hasPermission('settings.notifications')) : ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(Request::is('backend/settings/notifications*') ? 'active' : ''); ?>"
                           href="<?php echo e(route('backend.settings.notifications')); ?>"><?php echo app('translator')->getFromJson('app.notifications'); ?></a>
                    </li>
					<?php endif; ?>
                </ul>
            </li>
			<?php endif; ?>
        </ul>
    </div>
</nav>


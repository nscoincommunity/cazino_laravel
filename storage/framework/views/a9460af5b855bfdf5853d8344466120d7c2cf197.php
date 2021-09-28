<!-- UNIT WITH POPP WINDOWS, BEGINNING -->
<!-- POPUP REGISTRATION AND AUTHORIZATION -->
<div class="modal" id="login-modal" style="display: none">
    <header class="modal__header">
        <div class="span modal__title">Авторизация</div>
        <span class="modal__icon icon icon_cancel js-close-popup"></span>
    </header>
    <form action="<?= route('frontend.auth.login.post') ?>" method="POST" data-type="ajax">
		<input type="hidden" value="<?= csrf_token() ?>" name="_token">
        <div class="modal__content">
            <div class="modal__input input">
                <label class="modal__label input__label">Имя пользователя</label>
                <input placeholder="Username" type="text" name="username" class="modal__input-inner input__inner">
            </div>
            <div class="modal__input input">
                <label class="modal__label input__label">Пароль</label>
                <input placeholder="Password" type="password" name="password" class="modal__input-inner input__inner">
				<?php if(settings('forgot_password')): ?>
                <span class="modal__caption" data-toggle="modal" data-target=".popup_restorePassword">Забыли пароль?</span>
				<?php endif; ?>
            </div>
            <div class="modal__error" style="display: none">
                <span class="modal__note modal__note_important"></span>
                <span class="modal__note modal__note_accent"></span>
            </div>
        </div>
        <div class="popup__footer">
            <input type="submit" value="OK" class="popup__button button button_color_orange" />
        </div>
    </form>
</div>

<!-- POPUP REGISTRATION AND AUTHORIZATION -->
<!-- POPUP RECOVER PASSWORD -->
<?php if(settings('forgot_password')): ?>
<div class="popup popup_restorePassword" style="display: none">
    <header class="modal__header">
        <div class="span modal__title">Восстановить пароль</div>
        <span class="modal__icon icon icon_cancel js-close-popup"></span>
    </header>
    <form action="<?= route('frontend.password.remind.post') ?>" method="POST" data-type="ajax" data-answer=".popup_remindSuccess">
		<input type="hidden" name="_token" value="<?= csrf_token() ?>">
        <div class="popup__content">
            <div class="popup__input input">
                <label class="popup__label popup__label_small input__label">E-mail</label>
                <input type="text" name="email" required class="modal__input-inner input__inner" placeholder="E-mail">
            </div>
            <div class="modal__error" style="display:none">
                <div class="modal__note_important"></div>
            </div>
        </div>
        <div class="popup__footer">
            <input type="submit" value="OK" class="popup__button button button_color_orange" />
        </div>
    </form>
</div>
<?php endif; ?>
<!-- POPUP RECOVER PASSWORD -->
<!-- POPUP RECOVER PASSWORD INFO WINDOW -->
<?php if(settings('forgot_password')): ?>
<div class="popup popup_remindSuccess" style="display:none">
    <div class="popup__close js-close-popup">
        <svg class="svg__close svg-close-dims">
            <use xlink:href="/frontend/img/svgsprite.svg#close"></use>
        </svg>
    </div>
    <div class="popup__head">
        <div class="popup__title"> Системное уведомление</div>
    </div>
    <div class="popup__content">
        <div class="popup__title">Ваш пароль был отправлен на вашу почту <br /> Удачи в играх!</div>
    </div>
    <div class="popup__footer">
        <div class="popup__button button button_color_brightblue js-close-popup">Закрыть</div>
    </div>
</div>
<?php endif; ?>
<!-- POPUP RECOVER PASSWORD INFO WINDOW -->
<!-- POPUP REGISTRATION -->
<?php if(settings('reg_enabled')): ?>
<div class="modal" id="registration-confirm" style="display: none">
    <header class="modal__header">
        <div class="span modal__title">Регистрация</div>
        <span class="modal__icon icon icon_cancel js-close-popup"></span>
    </header>
    <form method="post" action="<?= route('frontend.register.post') ?>" data-type="ajax">
		<input type="hidden" value="<?= csrf_token() ?>" name="_token">
        <div class="modal__content">
            <div class="modal__input input">
                <label class="modal__label input__label">E-mail</label>
                <input placeholder="Ваш E-mail" type="text" name="email" class="modal__input-inner input__inner">
            </div>
            <div class="modal__input input">
                <label class="modal__label input__label">Пароль</label>
                <input placeholder="Придумайте пароль" type="password" name="password" class="modal__input-inner input__inner">
            </div>
				<?php if(settings('tos')): ?>                        
                <div class="registration__checkbox checkbox">
                    <input type="checkbox" id="rules" name="tos" id="tos" value="1" checked="checked" class="checkbox__inner">
                    <label for="rules" class="checkbox__label"><?php echo app('translator')->getFromJson('app.i_accept'); ?></label>
                </div>
				<?php endif; ?>
            <div class="modal__error" style="display: none">
                <span class="modal__note modal__note_important"></span>
                <span class="modal__note modal__note_accent"></span>
            </div>
        </div>
        <div class="popup__footer">
            <input type="submit" value="OK" class="popup__button button button_color_orange" />
        </div>
    </form>
</div>
<?php endif; ?>
<!-- POPUP REGISTRATION -->
<!-- POPUP REGISTRATION INFO OK -->
<?php if(settings('reg_email_confirmation')): ?>	
	<div class="popup popup_emailVerification" style="display:none">
		<div class="popup__close js-close-popup">
			<svg class="svg__close svg-close-dims">
				<use xlink:href="/frontend/img/svgsprite.svg#close"></use>
			</svg>
		</div>
		<div class="popup__head">
			<div class="popup__title">Системное уведомление</div>
		</div>
		<div class="popup__content">
			<div class="popup__caption">Ссылка для активации была отправлена на ваш адрес электронной почты, проверьте ее и перейдите по ссылке для завершения проверки</div>
		</div>
		<div class="popup__footer">
			<button class="popup__button button button_color_brightblue js-close-popup">Закрыть</button>
		</div>
	</div>
	<?php if( app('request')->input('verify_email') ): ?>
	<span id="verifyEmailModal" style="display: none;" data-toggle="modal" data-target=".popup_emailVerification">Подтвердите email?</span>
	<?php endif; ?>
<?php endif; ?>
<!-- POPUP REGISTRATION INFO OK -->

<?php if(Auth::check()): ?>
<!-- POPUP KASSA, PROFILE, VIP -->
<div class="popup popup_tabs" id="cabinet-modal" style="display: none">
    <div class="tab">
        <div class="tab__action">
            <a href="#cashier" target="_self" class="tab__item" data-toggle="tab">Касса</a>
            <a href="#profile" class="tab__item tab__item_active" data-toggle="tab">Профиль</a>
			<a href="#vip" class="tab__item tab__item_active" data-toggle="tab">VIP</a>
        </div>
        <div class="tab__content">
            <div class="tab-cashier" id="cashier">
                <div class="tab-cashier__header"></div>
                <div class="tab-cashier__content">
                    <div class="tab tab_style_button">
                        <div class="tab__action">
                            <a href="#payment-tab" target="_self" data-toggle="tab" class="tab__item tab__item_active">Депозит</a>
                            <a href="#history-tab" target="_self" data-toggle="tab" class="tab__item">История</a>
							<a href="#payout-tab" target="_self" data-toggle="tab" class="tab__item">Вывод</a>
                        </div>
                        <div class="tab__content">
                            <div id="payment-tab" class="active payment">
                                <div class="payment__gallery">
                                    <form method="POST" action="<?= route('frontend.profile.balance.post') ?>" class="payment-form" data-type="ajax">
										<input type="hidden" name="_token" value="<?= csrf_token() ?>">
                                        <input type="hidden" name="bonus_id" class="deposit-bonus-id">
                                        <div class="payment__row">
                                            <div class="payment__row-inner">
                                                <label class="payment__item payitem" data-paysys="coinpayment">
                                                    <input type="radio" name="system" value="coinpayment" style="display:none">
                                                    <div class="payitem__img">
                                                        <div class="payitem__img_inner">
                                                            <img src="/frontend/img/btc.png" style="width: 85px;" />
                                                        </div>
                                                    </div>
                                                    <div class="payitem__footer">
                                                        <p class="payitem__note payitem__note_small">Лимит:</p>
                                                        <p class="payitem__note">100 - 100000 USD</p>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="payment__tooltip">
                                            <div class="payment__tooltip_inner">
                                                <div class="pay-tooltip">
                                                    <div class="pay-tooltip__note" style="display: none"><i class="fa fa-exclamation-triangle"></i>
                                                        <span class="error__info"></span>
                                                    </div>
                                                    <div class="pay-tooltip__pin" style="display: none">
                                                        amount:
                                                        <span class="pay-tooltip__input">
                                                            <input type="text" name="amount" maxlength="14" placeholder="xxxxxxxxxx" class="pay-tooltip__pin_inner js-input__inner">
                                                        </span>
                                                        <button type="submit" class="pay-tooltip__button button button_color_orange">ОБНОВИТЬ</button>
                                                    </div>
                                                    <div class="pay-tooltip__summ">
                                                        Amount:
                                                        <label><input id="p_0_500" type="radio" name="money" value="0,001"> 0.001</label>
                                                        <label><input id="p_0_1000" type="radio" name="money" value="0,01"> 0.01</label>
                                                        <label><input id="p_0_5000" type="radio" name="money" value="0,1"> 0.1</label>
                                                        <input id="l_0_num" type="radio" name="money" value="500" checked class="l_num">
                                                        <div class="pay-tooltip__input input">
                                                            <input type="text" name="summ" class="input__inner input_summ_val js-input__inner" required value="0.001">
                                                        </div>
                                                        <button type="submit" class="pay-tooltip__button button button_color_orange">ОБНОВИТЬ</button>
                                                    </div>
													<div class="modal__error" style="display:none">
														<div class="modal__note_important"></div>
													</div>
                                                </div>												
                                            </div>											
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="history-tab" class="history">
                                <table class="history__table">
                                    <thead class="history__head">
                                        <tr class="history__row">
                                            <th class="history__cell">ID</th>
                                            <th class="history__cell"><?php echo app('translator')->getFromJson('app.date'); ?></th>
											<th class="history__cell"><?php echo app('translator')->getFromJson('app.type'); ?></th>
                                            <th class="history__cell"><?php echo app('translator')->getFromJson('app.sum'); ?></th>
                                            <th class="history__cell"><?php echo app('translator')->getFromJson('app.system'); ?></th>
											<th class="history__cell"><?php echo app('translator')->getFromJson('app.status'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody class="history__body">
									
										<?php
											$history = VanguardDK\Transaction::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate(15);
										?>
									
										<?php if(count($history)): ?>
											<?php $__currentLoopData = $history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr class="history__row">
												<td class="history__cell"><?php echo e($item->id); ?></td>
												<td class="history__cell"><?php echo e($item->created_at->format(config('app.date_format'))); ?></td>
												<td class="history__cell"><?php echo e($item->type); ?></td>
												<td class="history__cell"><?php echo e(abs($item->summ)); ?></td>
												<td class="history__cell"><?php echo e($item->admin ? $item->admin->username : $item->system); ?></td>
												<td class="history__cell">
													<?php if($item->status == 1): ?>
														Success
													<?php elseif( $item->status == -1 ): ?>
														Fail
													<?php else: ?>
														Waiting
													<?php endif; ?>
												</td>
											</tr>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php else: ?>
											<tr class="history__row">
												<td colspan="5"><?php echo app('translator')->getFromJson('app.no_records_found'); ?></td>
											</tr>
										<?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
							
                            <div id="payout-tab" class="history">
                                <table class="history__table">
                                    <thead class="history__head">
                                        <tr class="history__row">
                                            <th <p style="color:red">Для выплаты напишите на почту test@test.test, указжите сумму и реквизиты</p></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>							
							
                        </div>
                        <div class="tab__close js-close-popup"></div>
                    </div>
                </div>
            </div>
            <div class="profile active" id="profile">
                <div class="profile__table">
                    <div class="profile__aside">
                        <div class="profile__info">
                            <div class="profile-info">
                                <div class="profile-info__title title title_font_largest"><?php echo e(auth()->user()->present()->username); ?></div>
								<div class="profile-info__caption title">Ваш Уровень</div>
								<div class="profile-info__status">
                                    <div class="status status_huge">
                                        <div class="status__icon">
                                            <img src="/frontend/img/points/<?php echo e(Auth::user()->point->img); ?>" width="110">
                                        </div>
                                        <span class="status__note"><?php echo e(Auth::user()->point->name); ?></span>
                                    </div>
                                </div>
								
                                <div class="profile-info__rating">
                                    <div class="rating rating_profile">
                                        <div class="rating__stars rating__stars_large">
                                            <?php $level = 6 - Auth::user()->rating; ?>
											<?php for($i=1; $i <= Auth::user()->rating; $i++): ?>
												<img src="/frontend/img/stars.png" class="star_icon">
											<?php endfor; ?> 
											<?php if( $level ): ?>
												<?php for($i=1; $i <= $level; $i++): ?>
													<img src="/frontend/img/stars-not-active.png" class="star_icon">
												<?php endfor; ?>  
											<?php endif; ?>                                                                 
                                        </div>
                                        <div class="rating__bar">
                                            <div style="width:<?php echo e(Auth::user()->percent_next_level()); ?>%" class="rating__inner">
                                                <div class="rating__percent"><?php echo e(Auth::user()->percent_next_level()); ?>%</div>
                                            </div>
                                            <div class="rating__info">
                                                <i class="icon icon_info-light"></i>
                                                <div class="rating__tooltip tooltip tooltip_right">
                                                    <div class="tooltip__content">Вам необходимо внести депозиты на сумму <?php echo e(Auth::user()->left_next_level()); ?> для следующего уровня</div>
                                                    <div class="tooltip__arrow tooltip__arrow_right"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="rating__summary">
                                            <span class="rating__caption">Баланс:
                                            <span class="rating__caption_accent"><?php echo e(auth()->user()->present()->balance); ?> USD</span>
                                            </span>
                                            <span class="rating__title rating__title_large">VIP очки:</span>
                                            <span class="rating__title rating__title_large rating__title_accent">
                                                <?php echo e(Auth::user()->points); ?>

                                                <div class="rating__info">
                                                    <i class="icon icon_info-light"></i>
                                                    <div class="rating__tooltip tooltip">
                                                        <div class="tooltip__content">Вам необходимо внести депозиты на сумму <?php echo e(Auth::user()->left_next_level()); ?> для следующего уровня</div>
                                                        <div class="tooltip__arrow"></div>
                                                    </div>
                                                </div>
                                            </span>
                                        </div>
                                    </div>
                                </div>
								
								<?php if( auth()->user()->present()->bonus ): ?>
								<div class="profile-info__bonus">
                                    <div class="rating rating_profile rating_profile_bonus">
                                        <div class="rating__summary">
                                            <span class="rating__title rating__title_large">БОНУС:</span>
                                            <span class="rating__title rating__title_large rating__title_accent"><?php echo e(auth()->user()->present()->bonus); ?> USD</span>
                                        </div>
                                        <div class="rating__bar">
                                            <div style="width:<?php echo e((Auth::user()->wager/Auth::user()->bonus) * 100); ?>%" class="rating__inner">
                                                <div class="rating__percent"><?php echo e(round(Auth::user()->wager/Auth::user()->bonus,1) * 100); ?>%</div>
                                            </div>
                                            <div class="rating__info">
                                                <i class="icon icon_info-light"></i>
                                                <div class="rating__tooltip tooltip tooltip_right">
                                                    <div class="tooltip__content">Before wagering the bonus left to put down <?php echo e(Auth::user()->wager); ?></div>
                                                    <div class="tooltip__arrow tooltip__arrow_right"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<?php endif; ?>
								
                                <div class="profile-info__action">
                                    <button class="profile-info__button button button_color_orange" data-tab="#cashier" data-toggle="modal" data-target="#cabinet-modal">Касса</button>
                                    <div class="profile-info__icon">
                                        <svg class="svg-money svg-money-dims">
                                            <use xlink:href="/frontend/img/svgsprite.svg#money"></use>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="profile__main">
                        <form method="post" action="<?= route('frontend.profile.update.details') ?>" data-type="ajax" class="tab-profile__form">
							<input type="hidden" name="_token" value="<?= csrf_token() ?>">
                            <div class="profile-details">
                                <h3 class="profile-details__title title title_align_center">Личная информация</h3>
                                <div class="profile-details__action">
                                    <div class="profile-details__input">
                                        <div class="form-group field-profileform-firstname">
                                            <input type="text" id="profileform-firstname" class="input__inner" name="first_name" value="<?php echo e(auth()->user()->present()->first_name); ?>" placeholder="Имя">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="profile-details__input">
                                        <div class="form-group field-profileform-lastname">
                                            <input type="text" id="profileform-lastname" class="input__inner" name="last_name" value="<?php echo e(auth()->user()->present()->last_name); ?>" placeholder="Фамилия">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="profile-details__input">
                                        <div class="form-group field-profileform-birthday">
                                            <input type="text" id="profileform-birthday" class="input__inner datepicker_birth" name="birthday" value="<?php echo e(optional(auth()->user()->present()->birthday)->format('Y-m-d')); ?>" placeholder="ДАта рождения">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-contacts">
                                <h3 class="profile-contacts__title title title_align_center">Контактная информация</h3>
                                <div class="profile-contacts__action">
                                    <div class="profile-contacts__item">
                                        <div class="profile-contacts__input input">
                                            <div class="form-group field-profileform-email">
                                                <input type="text" id="profileform-email" class="input__inner input__inner_readonly" name="email" value="<?php echo e(auth()->user()->present()->email); ?>" readonly placeholder="Your e-mail">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile-contacts__item">
                                        <div class="profile-contacts__input input">
                                            <div class="form-group field-profileform-phone">
                                                <input type="text" id="profileform-phone" class="js-input__inner_tel input__inner" name="phone" value="<?php echo e(auth()->user()->present()->phone); ?>" maxlength="12" placeholder="00000000000">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal__error" style="display:none">
                                <div class="modal__note_important"></div>
                            </div>
                            <div class="profile__action">
                                <a class="profile__button button button_color_brightblue" data-toggle="modal" data-target=".popup_changePassword">Изменить пароль</a>
                                <button type="submit" class="profile__button profile__button_submit button button_color_orange">Сохранить изменения</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
			
<!-- VIP -->

<div class="vip active" id="vip">
                <div class="vip__header">
                    <span class="vip__title">
					Ваши очки: <?php echo e(Auth::user()->points); ?>

                        <span class="vip__icon">
                            <div class="rating__info">
                                <i class="icon icon_info-light"></i>
                                <div class="rating__tooltip rating__tooltip_right tooltip">
                                    <div class="tooltip__content">Вам необходимо внести депозиты на сумму <?php echo e(Auth::user()->left_next_level()); ?> для следующего уровня</div>
                                    <div class="tooltip__arrow tooltip__arrow_right"></div>
                                </div>
                            </div>
                        </span>
                    </span>
                </div>
                <div class="vip__action">
                    <div class="vip__table">
                        <form data-type="ajax" action="<?= route('frontend.profile.exchange') ?>" method="POST" id="exchange-form">
                            <input type="hidden" name="_token" value="<?= csrf_token() ?>">
                            <div class="vip__cell">
                                <span class="vip__subtitle">Количество баллов</span>
                                <div class="vip__input vip__input_color_white">
                                    <input type="text" id="exchange-input" name="sumpoints" class="input__inner" max="0.00" min="100" data-cours="<?php echo e(Auth::user()->point->exchange_rate(true)); ?>">
                                </div>
                            </div>
                            <div class="vip__cell">
                                <span class="vip__subtitle">Обменный курс</span>
                                <div class="vip__viewrate"><?php echo e(Auth::user()->point->exchange_rate()); ?></div>
                            </div>
                            <div class="vip__cell">
                                <span class="vip__subtitle">Ты получишь</span>
                                <div class="vip__input vip__input_color_yellow">
                                    <input type="text" id="exchange-output" class="input__inner" data-cours="<?php echo e(Auth::user()->point->exchange_rate(true)); ?>">
                                </div>
                            </div>
                            <div class="modal__error" style="display: none">
                                <span class="modal__note modal__note_important"></span>
                                <span class="modal__note modal__note_accent"></span>
                            </div>
                        </form>
                    </div>
                    <button class="vip__button button button_color_orange" onclick="$('#exchange-form').submit()">Обмен на реальные деньги</button>
                </div>
                <div class="vip__levels-table">
                    <div class="levels-table">
                        <div class="levels-table__table">                                     
							<?php $__currentLoopData = \VanguardDK\Point::orderBy('rating', 'ASC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $point): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="levels-table__item <?php if($point->rating == Auth::user()->rating): ?> levels-table__item_active <?php endif; ?>" data-toggle="tab" data-target="#vip_level_description_<?php echo e($point->rating); ?>">
                                <p class="levels-table__title levels-table__title_small"><?php echo e($point->name); ?></p>
                                <img src="/frontend/img/points/<?php echo e($point->img); ?>" class="levels-table__icon">
                                <div class="levels-table__ratenote"></div>
                                <span class="levels-table__caption">Exchange rate</span>
                                <div class="levels-table__viewrate"><?php echo e($point->exchange_rate()); ?></div>
                                <a class="levels-table__link">Still</a>
                                <span class="levels-table__arrow levels-table__arrow_active"></span>
                                <div class="levels-table__ratenote levels-table__ratenote_zero"><?php echo e(round($point->sum)); ?></div>
                            </div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                               
                        </div>
                        <div class="levels-table__slider">
                            <div class="levels-table__slider-bar">
                                <div class="levels-table__slider-inner" style="width:<?php echo e(Auth::user()->total_percent()); ?>%"></div>
                            </div>
                        </div>
                        <div class="tab__content">						
							<?php $__currentLoopData = \VanguardDK\Point::orderBy('rating', 'ASC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $point): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>							
							<div class="levels-table__info <?php if($point->rating == Auth::user()->rating): ?> active <?php endif; ?>" id="vip_level_description_<?php echo e($point->rating); ?>">
                                <div class="levels-table__status">
                                    <div class="levels-table__status-inner status status_huge">
                                        <img src="/frontend/img/points/<?php echo e($point->img); ?>" class="status__icon">
                                        <span class="status__note"><?php echo e($point->name); ?></span>
                                    </div>
                                </div>
                                <div class="levels-table__summary">
                                    <p class="levels-table__title levels-table__title_accent"><?php echo e($point->title); ?></p>
                                    <div class="levels-table__note"><?php echo $point->description; ?></div>
                                </div>
                            </div>							
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>

<!-- VIP -->			
			
			
			
        </div>
    </div>
    <div class="tab__close js-close-popup">
        <svg class="svg__close svg-close-dims">
            <use xlink:href="/frontend/img/svgsprite.svg#close"></use>
        </svg>
    </div>
</div>
<!-- POPUP CASS, PROFILE -->
<?php endif; ?>
<!-- POPUP CHANGE PASSWORD -->
<div class="popup popup_changePassword" style="display: none">
    <header class="modal__header">
        <div class="span modal__title">Изменить пароль</div>
        <span class="modal__icon icon icon_cancel js-close-popup"></span>
    </header>
    <form action="<?= route('frontend.profile.update.password') ?>" method="POST" data-type="ajax" data-answer=".popup_passwordChanged">
		<input type="hidden" name="_token" value="<?= csrf_token() ?>">
        <div class="popup__content">
            <div class="popup__input input">
                <label class="popup__label popup__label_small input__label">Текущий пароль</label>
                <input type="password" name="old_password" required class="modal__input-inner input__inner" placeholder="Current password">
            </div>
            <div class="popup__input input">
                <label class="popup__label popup__label_small input__label">Новый пароль</label>
                <input type="password" name="password" required class="modal__input-inner input__inner" placeholder="New password">
            </div>
            <div class="popup__input input">
                <label class="popup__label popup__label_small input__label">Подтвердите Пароль</label>
                <input type="password" name="password_confirmation" required class="modal__input-inner input__inner" placeholder="Confirm password">
            </div>
            <div class="modal__error" style="display:none">
                <div class="modal__note_important"></div>
            </div>
        </div>
        <div class="popup__footer">
            <input type="submit" value="OK" class="popup__button button button_color_orange" />
        </div>
    </form>
</div>
<div class="popup popup_passwordChanged" style="display:none">
    <div class="popup__close js-close-popup">
        <svg class="svg__close svg-close-dims">
            <use xlink:href="/frontend/img/svgsprite.svg#close"></use>
        </svg>
    </div>
    <div class="popup__head">
        <div class="popup__title"> Системное уведомление</div>
    </div>
    <div class="popup__content">
        <div class="popup__title">Ваш пароль был изменен <br /> Удачи в ваших играх!</div>
    </div>
    <div class="popup__footer">
        <div class="popup__button button button_color_brightblue js-close-popup">Закрыть</div>
    </div>
</div>
<!-- POPUP CHANGE PASSWORD -->


<?php if( app('request')->input('provider') ): ?>
<div class="popup popup_setEmail" style="display: none">
    <div class="popup__close js-close-popup"><i class="icon icon_cross-bold"></i></div>
    <form action="<?= route('frontend.social.callback.post', app('request')->all()) ?>" method="POST" >
		<input type="hidden" value="<?= csrf_token() ?>" name="_token">
        <div class="popup__head">
            <div class="popup__title">Укажите e-mail</div>
        </div>
        <div class="popup__content">
            <div class="popup__subtitle">Ваш e-mail</div>
            <div class="popup__input input">
                <input class="input__inner" type="text" name="email" placeholder="Your e-mail">
            </div>
            <div class="modal__error" style="">
                <span class="modal__note modal__note_important"></span>
                <span class="modal__note modal__note_accent"></span>
            </div>
        </div>
        <div class="popup__footer">
            <input type="submit" value="Указать" class="popup__button button button_color_orange" />
        </div>
    </form>
</div>
<span id="showEmailModal" style="display: none;" data-toggle="modal" data-target=".popup_setEmail">Укажите email?</span>
<?php endif; ?>

<div class="popup popup_returnsSuccess" style="display:none">
    <div class="popup__close js-close-popup">
        <svg class="svg__close svg-close-dims">
            <use xlink:href="/frontend/img/svgsprite.svg#close"></use>
        </svg>
    </div>
    <div class="popup__head">
        <div class="popup__title">Уведомление</div>
    </div>
    <div class="popup__content">
        <div class="popup__title">Возврат <span id="returnsValue"></span> сумма добавлена на ваш баланс!<br><br><br></div>
    </div>
    <div class="popup__footer">
        <div class="popup__button button button_color_brightblue js-close-popup">Закрыть</div>
    </div>
</div>


<!-- POP WINDOW UNIT, END -->
<div class="overflow"></div>
<div class="scroller">
    <div class="scroller__icon">
        <i class="fa fa-arrow-up" aria-hidden="true"></i>
    </div>
    <span class="scroller__note">К началу</span>
</div>
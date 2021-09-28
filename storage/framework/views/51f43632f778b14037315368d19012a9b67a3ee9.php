<?php if(!Auth::check()): ?>
    <!-- Login modal -->
    <div class="modal" id="login-modal" style="display: none">
        <header class="modal__header">
            <div class="span modal__title"><?php echo app('translator')->getFromJson('app.authorization'); ?></div>
            <span ng-click="closeModal($event)" class="modal__icon icon icon_cancel js-close-popup"></span>
        </header>
        <form ng-submit="sendForm($event)" action="<?php echo e(route('frontend.auth.login.post')); ?>" method="POST">
            <div class="modal__content">
                <div class="modal__input input">
                    <input placeholder="<?php echo app('translator')->getFromJson('app.username'); ?>" type="text" name="username"
                           class="modal__input-inner input__inner">
                </div>
                <div class="modal__input input">
                    <input placeholder="<?php echo app('translator')->getFromJson('app.password'); ?>" type="password" name="password"
                           class="modal__input-inner input__inner">
                    <?php if(settings('forgot_password')): ?>
                        <span class="modal__caption" ng-click="openModal($event, '#restore-password')">
                            <?php echo app('translator')->getFromJson('app.forgot_your_password'); ?>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="modal__error" style="display: none"></div>
            </div>
            <div class="popup__footer">
                <input type="submit" value="<?php echo app('translator')->getFromJson('app.login'); ?>" class="popup__button button"/>
            </div>
        </form>
        <div class="modal-preloader" style="display:none"></div>
    </div>

    <!-- popup registration -->
    <?php if(settings('reg_enabled')): ?>
        <div class="modal" id="registration-confirm" style="display: none">
            <header class="modal__header">
                <div class="span modal__title"><?php echo app('translator')->getFromJson('app.register_new_member'); ?></div>
                <span ng-click="closeModal($event)" class="modal__icon icon icon_cancel js-close-popup"></span>
            </header>
            <form ng-submit="sendForm($event)" method="post" action="<?php echo e(route('frontend.register.post')); ?>">
                <div class="modal__content">
                    <div class="modal__input input">
                        <input placeholder="<?php echo app('translator')->getFromJson('app.email'); ?>" type="text" name="email"
                               class="modal__input-inner input__inner">
                    </div>
                    <div class="modal__input input">
                        <input placeholder="<?php echo app('translator')->getFromJson('app.password'); ?>" type="password" name="password"
                               class="modal__input-inner input__inner">
                    </div>
                    <?php if(settings('tos')): ?>
                        <div class="registration__checkbox checkbox">
                            <input type="checkbox" id="rules" name="tos" id="tos" value="1" checked="checked"
                                   class="checkbox__inner">
                            <label for="rules" class="checkbox__label"><?php echo app('translator')->getFromJson('app.i_accept'); ?></label>
                        </div>
                    <?php endif; ?>
                    <div class="modal__error" style="display: none"></div>
                </div>
                <div class="popup__footer">
                    <input type="submit" value="<?php echo app('translator')->getFromJson('app.register'); ?>" class="popup__button button"/>
                </div>
            </form>
            <div class="modal-preloader" style="display:none"></div>
        </div>
    <?php endif; ?>

    <!-- popup recover password -->
    <?php if(settings('forgot_password')): ?>
        <div class="modal" id="restore-password" style="display: none">
            <header class="modal__header">
                <div class="span modal__title"><?php echo app('translator')->getFromJson('app.restore_password'); ?></div>
                <span ng-click="closeModal($event)" class="modal__icon icon icon_cancel js-close-popup"></span>
            </header>
            <form ng-submit="sendForm($event)"
                  action="<?php echo e(route('frontend.password.remind.post')); ?>"
                  method="POST"
                  data-modal-success="#restore-password-success">
                <div class="modal__content">
                    <div class="modal__input input input-restore-email">
                        <input type="text" name="email" required class="modal__input-inner input__inner"
                               placeholder="<?php echo app('translator')->getFromJson('app.email'); ?>">
                    </div>
                    <div class="modal__error" style="display:none"></div>
                </div>
                <div class="popup__footer">
                    <input type="submit" value="<?php echo app('translator')->getFromJson('app.request_new_password'); ?>" class="popup__button button"/>
                </div>
            </form>
            <div class="modal-preloader" style="display:none"></div>
        </div>
    <?php endif; ?>

    <!-- modal recover password info window -->
    <?php if(settings('forgot_password')): ?>
        <div class="modal" id="restore-password-success" style="display:none">
            <header class="modal__header">
                <div class="span modal__title"><?php echo app('translator')->getFromJson('app.system_notification'); ?></div>
                <span ng-click="closeModal($event)" class="modal__icon icon icon_cancel js-close-popup"></span>
            </header>
            <div class="modal__content">
                <div class="modal-text"><?php echo app('translator')->getFromJson('app.reset_password_message'); ?><br/><?php echo app('translator')->getFromJson('app.good_luck_in_games'); ?></div>
            </div>
            <div class="popup__footer">
                <input ng-click="closeModal($event)" type="submit" value="<?php echo app('translator')->getFromJson('app.close'); ?>"
                       class="popup__button button"/>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>

<!-- modal profile -->
<?php if(Auth::check()): ?>
    <div class="modal popup_tabs" id="my-account" style="display: none">
        <div class="tab">
            <div class="tab__action">
                <a ng-click="setActiveTab($event, 'cashier')"
                   ng-class="{'tab__item_active': myAccountActiveTab === 'cashier'}"
                   href="#cashier"
                   class="tab__item">
                    <?php echo app('translator')->getFromJson('app.cashbox'); ?>
                </a>
                <a ng-click="setActiveTab($event, 'profile')"
                   ng-class="{'tab__item_active': myAccountActiveTab === 'profile'}"
                   href="#profile"
                   class="tab__item">
                    <?php echo app('translator')->getFromJson('app.profile'); ?>
                </a>
                <a ng-click="setActiveTab($event, 'vip')"
                   ng-class="{'tab__item_active': myAccountActiveTab === 'vip'}"
                   href="#vip"
                   class="tab__item">
                    VIP
                </a>
            </div>
            <div class="tab__content">
                <div ng-show="isActiveTab('cashier')" class="tab-cashier" id="cashier">
                    <div class="sub_tab__action">
                        <ul>
                            <li>
                                <a ng-click="setActiveSubTab($event, 'payment')"
                                   ng-class="{'tab__item_active': cashierActiveTab === 'payment'}"
                                   href="#payment-tab"
                                   class="tab__item_active">
                                    <?php echo app('translator')->getFromJson('app.deposit'); ?>
                                </a>
                            </li>
                            <li>
                                <a ng-click="setActiveSubTab($event, 'history')"
                                   ng-class="{'tab__item_active': cashierActiveTab === 'history'}"
                                   href="#history-tab">
                                    <?php echo app('translator')->getFromJson('app.history'); ?>
                                </a>
                            </li>
                            <li>
                                <a ng-click="setActiveSubTab($event, 'payout')"
                                   ng-class="{'tab__item_active': cashierActiveTab === 'payout'}"
                                   href="#payout-tab">
                                    <?php echo app('translator')->getFromJson('app.cash_withdrawal'); ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-cashier__content">
                        <div class="tab tab_style_button">
                            <div class="tab__content">
                                <div ng-show="isActiveSubTab('payment')" id="payment-tab active" class="payment">
                                    <div class="payment__gallery">
                                        <form ng-submit="sendForm($event)" method="POST"
                                              action="<?php echo e(route('frontend.profile.balance.post')); ?>" class="payment-form">
                                            <input type="hidden" name="bonus_id" class="deposit-bonus-id">
                                            <div class="payment__row">
                                                <div class="payment__row-inner">
                                                    
                                                    <label class="payment__item payitem" data-paysys="free-kassa">
                                                        <input type="radio" name="system" value="free-kassa"
                                                               style="display:none">
                                                        <div class="payitem__img">
                                                            <div class="payitem__img_inner">
                                                                <img src="/frontend/img/free-kassa.png"/>
                                                            </div>
                                                        </div>
                                                        <div class="payitem__footer">
                                                            <p class="payitem__note payitem__note_small"><?php echo app('translator')->getFromJson('app.limit'); ?>
                                                                :</p>
                                                            <p class="payitem__note">100 - 100000 USD</p>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="payment__tooltip">
                                                <div class="payment__tooltip_inner">
                                                    <div class="pay-tooltip">
                                                        <div class="pay-tooltip__note" style="display: none"><i
                                                                    class="fa fa-exclamation-triangle"></i>
                                                            <span class="error__info"></span>
                                                        </div>
                                                        <div class="pay-tooltip__pin" style="display: none">
                                                            <?php echo app('translator')->getFromJson('app.amount'); ?>:
                                                            <span class="pay-tooltip__input">
                                                            <input type="text" name="amount" maxlength="14"
                                                                   placeholder="xxxxxxxxxx"
                                                                   class="pay-tooltip__pin_inner js-input__inner">
                                                        </span>
                                                            <button type="submit"
                                                                    class="pay-tooltip__button button button_color_orange">
                                                                ОБНОВИТЬ
                                                            </button>
                                                        </div>
                                                        <div class="pay-tooltip__summ">
                                                            <?php echo app('translator')->getFromJson('app.amount'); ?>:
                                                            <label><input id="p_0_500" type="radio" name="money"
                                                                          value="0,001"> 0.001</label>
                                                            <label><input id="p_0_1000" type="radio" name="money"
                                                                          value="0,01"> 0.01</label>
                                                            <label><input id="p_0_5000" type="radio" name="money"
                                                                          value="0,1"> 0.1</label>
                                                            <input id="l_0_num" type="radio" name="money" value="500"
                                                                   checked class="l_num">
                                                            <div class="pay-tooltip__input input">
                                                                <input type="text" name="summ"
                                                                       class="input__inner input_summ_val js-input__inner"
                                                                       required value="0.001">
                                                            </div>
                                                            <button type="submit"
                                                                    class="pay-tooltip__button button button_color_orange">
                                                                <?php echo app('translator')->getFromJson('app.refill'); ?>
                                                            </button>
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
                                <div ng-show="isActiveSubTab('history')" id="history-tab" class="history">
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
                                <div ng-show="isActiveSubTab('payout')" id="payout-tab" class="history">
                                    <div class="payment__gallery">
                                        <?php
                                            $fiveManyList = \VanguardDK\Model\PaymentSystem::where('operation', 2)->where('active', 1)->orderBy('id', 'DESC')->get();
                                        ?>

                                        <?php $__currentLoopData = $fiveManyList->chunk(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <form ng-submit="sendForm($event)" method="POST"
                                                  action="<?php echo e(route('frontend.payment.addtask.post')); ?>"
                                                  class="payment-form">
                                                <input type="hidden" name="operation" value="2">
                                                <div class="payment__row">
                                                    <div class="payment__row-inner">
                                                        <?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fiveManyItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <label class="payment__item payitem">
                                                                <input type="radio" name="type"
                                                                       value="<?php echo e($fiveManyItem->type); ?>"
                                                                       style="display:none" class="payout">
                                                                <div class="payitem__img">
                                                                    <div class="payitem__img_inner">
                                                                        <svg class="svg-card_rub-dims">
                                                                            <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                 xlink:href="/assets/img/brandslogo.svg#<?php echo e($fiveManyItem->type); ?>"></use>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                                <div class="payitem__footer">
                                                                    <p class="payitem__note payitem__note_small">
                                                                        <?php echo app('translator')->getFromJson('app.limit'); ?>:</p>
                                                                    <p class="payitem__note"><?php echo e($fiveManyItem->min_amount); ?>

                                                                        - <?php echo e($fiveManyItem->max_amount); ?> RUB</p>
                                                                </div>
                                                            </label>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                                <div class="payment__tooltip collapse">
                                                    <div class="payment__tooltip_inner">
                                                        <div class="pay-tooltip pay-tooltip_withphone">
                                                            <div class="pay-tooltip__note" style="display: none"><i
                                                                        class="fa fa-exclamation-triangle"></i>
                                                                <span class="error__info"></span>
                                                            </div>
                                                            <div class="pay-tooltip__number pay-tooltip__number_withplus">
                                                                <span class="pay-tooltip__caption"><?php echo app('translator')->getFromJson('app.wallet_number'); ?>:</span>
                                                                <span class="pay-tooltip__input">
                                                        <input type="text" name="account" placeholder="70000000000"
                                                               required="required"
                                                               class="pay-tooltip__number_inner input__inner js-input__inner"
                                                               maxlength="14">
                                                        </span>
                                                            </div>
                                                            <div class="pay-tooltip__input input"><?php echo app('translator')->getFromJson('app.amount_to_withdraw'); ?>
                                                                :
                                                                <input type="text" required=""
                                                                       placeholder="<?php echo app('translator')->getFromJson('app.amount'); ?>"
                                                                       name="amount"
                                                                       class="input__inner js-input__inner">
                                                            </div>
                                                            <div class="modal__error" style="display:none">
                                                                <div class="modal__note_important"></div>
                                                            </div>
                                                            <div class="pay-tooltip-footer">
                                                                <button type="submit"
                                                                        class="pay-tooltip__button pay-tooltip__button_withdraw button">
                                                                    <?php echo app('translator')->getFromJson('app.send_request'); ?>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="tab__close js-close-popup"></div>
                        </div>
                    </div>
                </div>
                <div ng-show="isActiveTab('profile')" class="profile active" id="profile">
                    <div class="profile__table">
                        <div class="profile__aside">
                            <div class="profile__info">
                                <div class="profile-info">
                                    <div class="profile-info__title title title_font_largest"><?php echo e(auth()->user()->present()->username); ?></div>
                                    <div class="profile-info__caption title">
                                        <?php echo app('translator')->getFromJson('app.your_level'); ?>
                                    </div>
                                    <div class="profile-info__status">
                                        <div class="status status_huge">
                                            <div class="status__icon">
                                                <img src="/frontend/img/points/<?php echo e(Auth::user()->point->img); ?>"
                                                     width="110">
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
                                                <div style="width:<?php echo e(Auth::user()->percent_next_level()); ?>%"
                                                     class="rating__inner">
                                                    <div class="rating__percent"><?php echo e(Auth::user()->percent_next_level()); ?>

                                                        %
                                                    </div>
                                                </div>
                                                <div class="rating__info">
                                                    <i class="icon icon_info-light"></i>
                                                    <div class="rating__tooltip tooltip tooltip_right">
                                                        <div class="tooltip__content">
                                                            <?php echo app('translator')->getFromJson('app.next_level_tooltip', array('amount' => Auth::user()->left_next_level())); ?>
                                                        </div>
                                                        <div class="tooltip__arrow tooltip__arrow_right"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rating__summary">
                                            <span class="rating__caption"><?php echo app('translator')->getFromJson('app.balance'); ?>:
                                                <span class="rating__caption_accent"><?php echo e(auth()->user()->present()->balance); ?> USD</span>
                                            </span>
                                                <span class="rating__title rating__title_large"><?php echo app('translator')->getFromJson('app.vip_points'); ?>:</span>
                                                <span class="rating__title rating__title_large rating__title_accent">
                                                <?php echo e(Auth::user()->points); ?>

                                                <div class="rating__info">
                                                    <i class="icon icon_info-light"></i>
                                                    <div class="rating__tooltip tooltip">
                                                        <div class="tooltip__content">
                                                            <?php echo app('translator')->getFromJson('app.next_level_tooltip', array('amount' => Auth::user()->left_next_level())); ?>
                                                        </div>
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
                                                    <div style="width:<?php echo e((Auth::user()->wager/Auth::user()->bonus) * 100); ?>%"
                                                         class="rating__inner">
                                                        <div class="rating__percent"><?php echo e(round(Auth::user()->wager/Auth::user()->bonus,1) * 100); ?>

                                                            %
                                                        </div>
                                                    </div>
                                                    <div class="rating__info">
                                                        <i class="icon icon_info-light"></i>
                                                        <div class="rating__tooltip tooltip tooltip_right">
                                                            <div class="tooltip__content">Before wagering the bonus left
                                                                to put down <?php echo e(Auth::user()->wager); ?></div>
                                                            <div class="tooltip__arrow tooltip__arrow_right"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <div class="profile-info__action">
                                        <button ng-click="setActiveTab($event, 'cashier')"
                                                class="profile-info__button button">
                                            <?php echo app('translator')->getFromJson('app.deposit'); ?>
                                        </button>
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
                            <form ng-submit="sendForm($event)" method="post" action="<?= route('frontend.profile.update.details') ?>"
                                  data-type="ajax" class="tab-profile__form">
                                <div class="profile-details">
                                    <h3 class="profile-details__title title title_align_center">
                                        <?php echo app('translator')->getFromJson('app.personal_information'); ?>
                                    </h3>
                                    <div class="profile-details__action">
                                        <div class="profile-details__input">
                                            <div class="form-group field-profileform-firstname">
                                                <input type="text" id="profileform-firstname" class="input__inner"
                                                       name="first_name"
                                                       value="<?php echo e(auth()->user()->present()->first_name); ?>"
                                                       placeholder="<?php echo app('translator')->getFromJson('app.first_name'); ?>">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                        <div class="profile-details__input">
                                            <div class="form-group field-profileform-lastname">
                                                <input type="text" id="profileform-lastname" class="input__inner"
                                                       name="last_name"
                                                       value="<?php echo e(auth()->user()->present()->last_name); ?>"
                                                       placeholder="<?php echo app('translator')->getFromJson('app.last_name'); ?>">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                        <div class="profile-details__input">
                                            <div class="form-group field-profileform-birthday">
                                                <input type="text" id="profileform-birthday"
                                                       class="input__inner datepicker_birth" name="birthday"
                                                       value="<?php echo e(optional(auth()->user()->present()->birthday)->format('Y-m-d')); ?>"
                                                       placeholder="<?php echo app('translator')->getFromJson('app.date_of_birth'); ?>">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-contacts">
                                    <h3 class="profile-contacts__title title title_align_center">
                                        <?php echo app('translator')->getFromJson('app.contact_information'); ?>
                                    </h3>
                                    <div class="profile-contacts__action">
                                        <div class="profile-contacts__item">
                                            <div class="profile-contacts__input input">
                                                <div class="form-group field-profileform-email">
                                                    <input type="text" id="profileform-email"
                                                           class="input__inner input__inner_readonly" name="email"
                                                           value="<?php echo e(auth()->user()->present()->email); ?>" readonly
                                                           placeholder="Your e-mail">
                                                    <div class="help-block"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="profile-contacts__item">
                                            <div class="profile-contacts__input input">
                                                <div class="form-group field-profileform-phone">
                                                    <input type="text" id="profileform-phone"
                                                           class="js-input__inner_tel input__inner" name="phone"
                                                           value="<?php echo e(auth()->user()->present()->phone); ?>" maxlength="12"
                                                           placeholder="00000000000">
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
                                    <a class="profile__button button button_color_brightblue"
                                       ng-click="openModal($event, '#change-password')"><?php echo app('translator')->getFromJson('app.change_password'); ?></a>
                                    <button type="submit"
                                            class="profile__button profile__button_submit button button_color_orange">
                                        <?php echo app('translator')->getFromJson('app.save_changes'); ?>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div ng-show="isActiveTab('vip')" class="vip active" id="vip">
                    <div class="vip__header">
                    <span class="vip__title">
					<?php echo app('translator')->getFromJson('app.vip_points'); ?>: <?php echo e(Auth::user()->points); ?>

                        <span class="vip__icon">
                            <div class="rating__info">
                                <i class="icon icon_info-light"></i>
                                <div class="rating__tooltip rating__tooltip_right tooltip">
                                    <div class="tooltip__content"><?php echo app('translator')->getFromJson('app.next_level_tooltip', array('amount' => Auth::user()->left_next_level())); ?></div>
                                    <div class="tooltip__arrow tooltip__arrow_right"></div>
                                </div>
                            </div>
                        </span>
                    </span>
                    </div>
                    <div class="vip__action">
                        <form ng-submit="sendForm($event)" action="<?= route('frontend.profile.exchange') ?>" method="POST"
                              id="exchange-form">
                            <div class="vip__table">
                                    <div class="vip__cell">
                                        <span class="vip__subtitle"><?php echo app('translator')->getFromJson('app.number_of_points'); ?></span>
                                        <div class="vip__input vip__input_color_white">
                                            <input type="text" id="exchange-input" name="sumpoints" class="input__inner"
                                                   max="0.00" min="100"
                                                   data-cours="<?php echo e(Auth::user()->point->exchange_rate(true)); ?>">
                                        </div>
                                    </div>
                                    <div class="vip__cell">
                                        <span class="vip__subtitle"><?php echo app('translator')->getFromJson('app.exchange_rate'); ?></span>
                                        <div class="vip__viewrate"><?php echo e(Auth::user()->point->exchange_rate()); ?></div>
                                    </div>
                                    <div class="vip__cell">
                                        <span class="vip__subtitle"><?php echo app('translator')->getFromJson('app.you_will_get'); ?></span>
                                        <div class="vip__input vip__input_color_yellow">
                                            <input type="text" id="exchange-output" class="input__inner"
                                                   data-cours="<?php echo e(Auth::user()->point->exchange_rate(true)); ?>">
                                        </div>
                                    </div>
                            </div>
                            <div class="modal__error" style="display: none">
                                <span class="modal__note modal__note_important"></span>
                                <span class="modal__note modal__note_accent"></span>
                            </div>
                            <button class="vip__button button button_color_orange">
                                <?php echo app('translator')->getFromJson('app.exchange_for_real_money'); ?>
                            </button>
                        </form>
                    </div>
                    <?php
                        $rating = \VanguardDK\Point::orderBy('rating', 'ASC')->get();
                    ?>
                    <div class="vip__levels-table">
                        <div class="levels-table">
                            <div class="levels-table__table">
                                <?php $__currentLoopData = $rating; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $point): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="levels-table__item <?php if($point->rating == Auth::user()->rating): ?> levels-table__item_active <?php endif; ?>" data-target="#vip_level_description_<?php echo e($point->rating); ?>">
                                        <p class="levels-table__title levels-table__title_small"><?php echo e($point->name); ?></p>
                                        <img src="/frontend/img/points/<?php echo e($point->img); ?>" class="levels-table__icon">
                                        <div class="levels-table__ratenote"></div>
                                        <span class="levels-table__caption"><?php echo app('translator')->getFromJson('app.exchange_rate'); ?></span>
                                        <div class="levels-table__viewrate"><?php echo e($point->exchange_rate()); ?></div>
                                        <a class="levels-table__link"><?php echo app('translator')->getFromJson('app.still'); ?></a>
                                        <span class="levels-table__arrow <?php if($point->rating == Auth::user()->rating): ?> levels-table__arrow_active <?php endif; ?>"></span>
                                        <div class="levels-table__ratenote levels-table__ratenote_zero"><?php echo e(round($point->sum)); ?></div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="levels-table__slider">
                                <div class="levels-table__slider-bar">
                                    <div class="levels-table__slider-inner"
                                         style="width:<?php echo e(Auth::user()->total_percent()); ?>%"></div>
                                </div>
                            </div>
                            <div class="tab__content">
                                <?php $__currentLoopData = $rating; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $point): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
            </div>
        </div>
        <div ng-click="closeModal($event)" class="tab__close modal__icon icon icon_cancel js-close-popup"></div>
        <div class="modal-preloader" style="display:none"></div>
    </div>

    <!-- popup change password -->
    <div class="modal popup_changePassword" id="change-password" style="display: none">
        <header class="modal__header">
            <div class="span modal__title">
                <?php echo app('translator')->getFromJson('app.change_password'); ?>
            </div>
            <span ng-click="closeModal($event)" class="modal__icon icon icon_cancel js-close-popup"></span>
        </header>
        <form ng-submit="sendForm($event)"
              action="<?= route('frontend.profile.update.password') ?>"
              method="POST"
              data-modal-success="#password-changed">
            <div class="modal__content">
                <div class="popup__input input">
                    <input type="password" name="old_password" required class="modal__input-inner input__inner"
                           placeholder="<?php echo app('translator')->getFromJson('app.current_password'); ?>">
                </div>
                <div class="popup__input input">
                    <input type="password" name="password" required class="modal__input-inner input__inner"
                           placeholder="<?php echo app('translator')->getFromJson('app.new_password'); ?>">
                </div>
                <div class="popup__input input">
                    <input type="password" name="password_confirmation" required class="modal__input-inner input__inner"
                           placeholder="<?php echo app('translator')->getFromJson('app.confirm_password'); ?>">
                </div>
                <div class="modal__error" style="display:none">
                    <div class="modal__note_important"></div>
                </div>
            </div>
            <div class="popup__footer">
                <input type="submit" value="<?php echo app('translator')->getFromJson('app.change'); ?>" class="popup__button button"/>
            </div>
        </form>
        <div class="modal-preloader" style="display:none"></div>
    </div>

    <div class="modal" id="password-changed" style="display:none">
        <header class="modal__header">
            <div class="span modal__title"><?php echo app('translator')->getFromJson('app.system_notification'); ?></div>
            <span ng-click="closeModal($event)" class="modal__icon icon icon_cancel js-close-popup"></span>
        </header>
        <div class="modal__content">
            <div class="modal-text"><?php echo app('translator')->getFromJson('app.your_password_has_been_changed'); ?> <br/><?php echo app('translator')->getFromJson('app.good_luck_in_games'); ?></div>
        </div>
        <div class="popup__footer">
            <input ng-click="closeModal($event)" type="submit" value="<?php echo app('translator')->getFromJson('app.close'); ?>" class="popup__button button"/>
        </div>
    </div>
<?php endif; ?>

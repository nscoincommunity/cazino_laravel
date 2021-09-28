<div class="header__toppanel header__toppanel_logged">
    <div class="user-toppanel">
        <div class="user-toppanel__title">
            <span class="user-toppanel__name">Привет!</span>
            <span class="user-toppanel__name">{{ auth()->user()->present()->username }}</span>
        </div>
        <div class="user-toppanel__nav">
            <a href="#cabinet-modal" data-tab="#profile" data-toggle="modal" class="user-toppanel__item user-toppanel__item_profile">
                <span class="user-toppanel__note">@lang('app.my_profile')</span>
			</a>
			
            <a href="#cabinet-modal" data-tab="#cashier" data-toggle="modal" class="user-toppanel__item user-toppanel__item_balance">
                <svg class="user-toppanel__icon svg-ruble svg-ruble-dims">
                    <use xlink:href="/frontend/img/svgsprite.svg#ruble"></use>
                </svg>
                <span class="user-toppanel__note">Баланс:</span>
                <span class="user-toppanel__note user-toppanel__note_accent"> <span id="balanceValue">{{ auth()->user()->present()->balance }}</span> RUB </span>
            </a>
			
            <a href="#cabinet-modal" data-tab="#vip" data-toggle="modal" class="user-toppanel__item user-toppanel__item_vip">
                <svg class="user-toppanel__icon user-toppanel__icon_vip svg-vip svg-ruble-dims">
                    <use xlink:href="/frontend/img/svgsprite.svg#vip"></use>
                </svg>
                <span class="user-toppanel__note">VIP очки:</span>
                <span class="user-toppanel__note user-toppanel__note_accent"> {{ Auth::user()->points }}</span>
            </a>
			
        @if ( auth()->user()->present()->bonus )
            <a href="#cabinet-modal" data-tab="#vip" data-toggle="modal" class="user-toppanel__item user-toppanel__item_vip">
                            <span class="user-toppanel__note">Бонус:</span>
                            <span class="user-toppanel__note user-toppanel__note_accent">{{ auth()->user()->present()->bonus }} RUB
							<div class="rating__summary">
                                <div class="rating__info"><i class="icon icon_info-light"></i>
                                    <div class="rating__tooltip tooltip">
                                        <div class="tooltip__content">Перед отыгрыванием бонуса осталось отложить {{ Auth::user()->wager }}</div>
                                        <div class="tooltip__arrow"></div>
                                    </div>
                                </div>
							</div>
							</span>
            </a>
        @endif			
			
        </div>
        <button class="user-toppanel__button button js-userpanel-button">
            Menu<span class="user-toppanel__icon_menu user-toppanel__icon"></span>
            <svg class="user-toppanel__icon user-toppanel__icon_close svg-cancel svg-cancel-dims">
                <use xlink:href="/frontend/img/svgsprite.svg#cancel"></use>
            </svg>
        </button>

        <ul id="language-select" class="language-logged">
            <li class="init"><i class="flag-icon flag-icon-{{app()->getLocale()}}"></i></li>
            @foreach(['ru', 'en', 'de'] as $langCode)
                <li data-value="{{$langCode}}" @if($langCode === app()->getLocale()) class="selected" @endif>
                    <i class="flag-icon flag-icon-{{$langCode}}"></i>
                </li>
            @endforeach
        </ul>

        <a href="{{ route('frontend.auth.logout') }}" class="user-toppanel__action">
            <div class="user-toppanel__note user-toppanel__note_important">@lang('app.logout')</div>
        </a>
    </div>
</div>

<div class="mobile-panel">
    <div class="logo">
        <a href="/"><img src="/frontend/img/logo.png" alt="GOLDSVET"></a>
    </div>
    <div class="mobile-panel__action">
        <div class="mobile-panel__cashier button button_color_orange button_font_cond" data-tab="#cashier" data-toggle="modal" data-target="#cabinet-modal">
            Деньги
        </div>
    </div>
</div>

<div class="header__panel header__panel_logged">
    <div class="logo">
        <a href="/"><img src="/frontend/img/logo.png" alt="GOLDSVET"></a>
    </div>
    <div class="user-panel">

        <div class="user-panel__button button button_color_orange button_font_cond" data-tab="#cashier" data-toggle="modal" data-target="#cabinet-modal">Деньги</div>
        
		@if ( auth()->user()->present()->count_return > 0 && auth()->user()->present()->balance == 0 )
		<a class="user-panel__countpad countpad" data-target="{{ route('frontend.profile.returns') }}" data-answer=".popup_returnsSuccess">
			<i class="countpad__icon" >
                <svg class="svg-gift">
                    <use xlink:href="/frontend/img/svgsprite.svg#gift"></use>
                </svg>
            </i>
            <span class="countpad__title">CashBack</span>
            <div class="countpad__counter">!</div>
        </a>
		@endif 
        <div class="user-panel__cell user-panel__cell_status">
            <div class="user-panel__status status">
                <i class="status__icon icon icon_vip-{{ Auth::user()->rating }}-small"></i>
            </div>
        </div>

        <div class="user-panel__cell user-panel__cell_rating">
		
            <div class="user-panel__rating rating">
			
                <div class="rating__summary"><span class="rating__title">{{ Auth::user()->point->name }}</span>
				
                    <div class="rating__stars">					
						@php $level = 6 - Auth::user()->rating; @endphp
						@for($i=1; $i <= Auth::user()->rating; $i++)
							<img src="/frontend/img/stars.png" class="star_icon">
						@endfor 
						@if( $level )
							@for($i=1; $i <= $level; $i++)
								<img src="/frontend/img/stars-not-active.png" class="star_icon">
							@endfor  
						@endif 
                    </div>
					
                    <div class="rating__bar">
					
                        <div style="width:{{ Auth::user()->percent_next_level() }}%" class="rating__inner">
                            <div class="rating__percent">{{ Auth::user()->percent_next_level() }}%</div>
                        </div>
						
                        <div class="rating__info"><i class="icon icon_info-light"></i>
						
                            <div class="rating__tooltip rating__tooltip_head tooltip">
                                <div class="tooltip__content">Вам необходимо внести депозиты на сумму {{ Auth::user()->left_next_level() }} для следующего уровня</div>
                                <div class="tooltip__arrow_head tooltip__arrow_right"></div>
                            </div>
							
                        </div>
						
                    </div>
                </div>
            </div>
        </div>

        <form action="/search" method="get" id="search-form" class="search_form" >
            <div class="search">
                <button type="submit" class="search__button" disabled="disabled"></button>
                <input placeholder="Найдите игру, например Book Of Ra" name="q" class="search__input" value="">
            </div>
        </form>	
	
        <div class="user-panel__cell user-panel__cell_action">
            
            <a href="#cabinet-modal" data-tab="#profile" data-toggle="modal" class="user-panel__profile">
                <span class="mobile-nav__icon ">
                    <svg class="svg-profile svg-profile-dims">
                        <use xlink:href="/frontend/img/svgsprite.svg#profile"></use>
                    </svg>
                </span>
                @lang('app.my_profile')
            </a>
			
			<a href="#cabinet-modal" data-tab="#vip" data-toggle="modal" class="user-panel__vip-points">
                <i class="user-panel_vip-points_icon">
                    <svg class="svg-vip-points svg-vip-points-dims">
                        <use xlink:href="/frontend/img/svgsprite.svg#vip-points"></use>
                    </svg>
                </i>
                <span class="user-panel__caption">VIP points:</span>
                <span class="user-panel__caption user-panel__caption_accent">  {{ Auth::user()->points }}</span>
            </a>
			
            <a href="{{ route('frontend.auth.logout') }}" class="user-panel__logout">@lang('app.logout')</a>
        </div><!-- user-panel__cell user-panel__cell_action -->
        
    </div>

    <div class="mobile-nav">
        <h5 class="mobile-nav__title">Menu</h5>
        <ul class="mobile-nav__list">
            <li class="mobile-nav__item">
                <span class="mobile-nav__icon ">
                    <svg class="svg game-hall svg-game-hall-dims">
                        <use xlink:href="/frontend/img/svgsprite.svg#game-hall"></use>
                    </svg>
                </span>
                <a class="mobile-nav__link {{ Request::is('game') ? 'active' : ''  }}" href="{{ route('frontend.game.list') }}">@lang('app.games')</a>
            </li>
            <li class="mobile-nav__item">
                <span class="mobile-nav__icon ">
                    <svg class="svg-promo svg-promo-dims">
                        <use xlink:href="/frontend/img/svgsprite.svg#promo"></use>
                    </svg>
                </span>
                <a class="mobile-nav__link " href="#">Promo</a>
            </li>
            <li class="mobile-nav__item">
                <span class="mobile-nav__icon ">
                    <svg class="svg tournament svg-tournament-dims">
                        <use xlink:href="/frontend/img/svgsprite.svg#tournament"></use>
                    </svg>
                </span>
                <a class="mobile-nav__link " href="#">Турниры</a>
            </li>
            <li class="mobile-nav__item">
                <span class="mobile-nav__icon ">
                    <svg class="svg-lottery svg-lottery-dims">
                        <use xlink:href="/frontend/img/svgsprite.svg#lottery"></use>
                    </svg>
                </span>
                <a class="mobile-nav__link " href="#">Лытыреи</a>
            </li>
            <li class="mobile-nav__item">
                <span class="mobile-nav__icon ">
                    <svg class="svg-vip-level svg-vip-level-dims">
                        <use xlink:href="/frontend/img/svgsprite.svg#vip-level"></use>
                    </svg>
                </span>
                <a class="mobile-nav__link " href="#">VIP points</a>
            </li>
        </ul>
    </div>
</div>

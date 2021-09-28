<div class="header__toppanel">
    <div class="toppanel">
        <div class="toppanel__title">
            <span class="toppanel__name">Привет!</span>
        </div>
        <button class="toppanel__button button js-toppanel-button">
            Меню
            <span class="toppanel__icon_menu toppanel__icon"></span>
            <svg class="toppanel__icon toppanel__icon_close svg-cancel svg-cancel-dims">
                <use xlink:href="/frontend/img/svgsprite.svg#cancel"></use>
            </svg>
        </button>

        <ul id="language-select" class="language-not-logged">
            <li class="init"><i class="flag-icon flag-icon-{{app()->getLocale()}}"></i></li>
            @foreach(['ru', 'en', 'de'] as $langCode)
                <li data-value="{{$langCode}}" @if($langCode === app()->getLocale()) class="selected" @endif>
                    <i class="flag-icon flag-icon-{{$langCode}}"></i>
                </li>
            @endforeach
        </ul>
    </div>
</div>

<div class="mobile-nav mobile-nav_dropdown js-mobilenav-dropdown">
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
            <a class="mobile-nav__link " href="#">Tournaments</a>
        </li>
        <li class="mobile-nav__item">
            <span class="mobile-nav__icon ">
                <svg class="svg-lottery svg-lottery-dims">
                    <use xlink:href="/frontend/img/svgsprite.svg#lottery"></use>
                </svg>
            </span>
            <a class="mobile-nav__link " href="#">Лотырея</a>
        </li>
        <li class="mobile-nav__item">
            <span class="mobile-nav__icon ">
                <svg class="svg-vip-level svg-vip-level-dims">
                    <use xlink:href="/frontend/img/svgsprite.svg#vip-level"></use>
                </svg>
            </span>
            <a class="mobile-nav__link " href="/points">VIP points</a>
        </li>
    </ul>
</div>

<div class="header__panel">
    <div class="head-panel">
    <div class="logo">
        <a href="/"><img src="/frontend/img/logo.png" alt="GOLDSVET"></a>
    </div>
		@if (settings('reg_enabled'))
        <div class="head-panel__cell head-panel__cell_fluid">
            <div class="head-panel__signup">
                <div class="signup">
                    <a class="signup__button button button_font_cond button_color_orange" data-toggle="modal" data-target="#registration-confirm">Регистрация</a>
                    <div class="signup__input input input_withbutton">
                        <input placeholder="In 15 seconds" class="input__inner" disabled>
                    </div>
                </div>
            </div>
        </div>
		@endif
        <div class="head-panel__cell">
            <a class="head-panel__button button button_font_cond" data-toggle="modal" href="#login-modal">Login</a>
        </div>

    </div>
    <div class="mobile-panel">
    <div class="logo">
        <a href="/"><img src="/frontend/img/logo.png" alt="GOLDSVET"></a>
    </div>
		@if (settings('reg_enabled'))
        <a class="mobile-panel__button button button_color_orange" data-toggle="modal" data-target="#registration-confirm">Регистрация</a>
		@endif
        <a class="mobile-panel__button mobile-panel__button_blue button" data-toggle="modal" href="#login-modal">Вход</a>
    </div>
</div>

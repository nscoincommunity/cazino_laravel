<!-- MENU MOBILE -->
<header class="header">
    <div class="header__left"></div>
    <div class="header__wrap wrap">
    <div class="header__wrap_bg"></div>
		@if(Auth::check())
			@include('frontend.partials.header_logged')
		@else
			@include('frontend.partials.header_not_logged')
		@endif		
    </div>
    <div class="header__right"></div>
</header>



<!-- MENU MOBILE -->
<div class="hero">
    <!-- SLIDER -->
    <div class="hero__slider">
        <div class="slider slider_hero">
            <div class="slider__item">
                <a data-toggle="modal" data-target="#registration-confirm">
                    <img src="/frontend/banners/bonuses_reg_mob2x.png" class="slider__img slider__img_mobile">
                    <img src="/frontend/banners/bonuses_reg.png" class="slider__img slider__img_desktop">
                </a>
            </div>
            <div class="slider__item">
                <a data-toggle="modal" data-target="#registration-confirm">
                    <img src="/frontend/banners/best_games_mob2x.png" class="slider__img slider__img_mobile">
                    <img src="/frontend/banners/best_games.png" class="slider__img slider__img_desktop">
                </a>
            </div>
            <div class="slider__item">
                <a data-toggle="modal" data-target="#registration-confirm">
                    <img src="/frontend/banners/withdrawal_mob2x.png" class="slider__img slider__img_mobile">
                    <img src="/frontend/banners/withdrawal.png" class="slider__img slider__img_desktop">
                </a>
            </div>
        </div>
    </div>
    <!-- SLIDER -->
    <div class="hero__wrap wrap">
        <!-- JACK POT -->
        <a class="hero__counter" href="/categories/jackpot">
            <div class="hero__countdown">
				@php 
					$totalJackpots = round(\VanguardDK\Jackpot::sum('balance')); 
					for($i=1; $i<=10; $i++){
						$totalJackpots += round(\VanguardDK\Game::sum('jp_' . $i)); 
					}
				@endphp
				
                <div class="countdown finecountdown" data-sum="{{ $totalJackpots }}" data-jack="{{ $totalJackpots }}" data-toggle="jackpot" id="banner-jackpot"></div>
            </div>
            <div class="hero__countnote">ДЖЕКПОТ КАЗИНО</div>
            <div class="hero__countbutton">USD</div>
        </a>
        <!-- JACK POT -->
        <!-- MENU -->
        <div class="hero__nav">
            <ul class="main-nav">	
				@php
					$current_cat = '';
					$cat_level_2 = '';
					$categories = VanguardDK\Category::where('parent', 0)->orderBy('position')->get();
					$route = Request::route()->getName();
					if( in_array($route, ['frontend.game.list.category','frontend.game.list.category_level2']) ){
					   $current_params = Route::current()->parameters();
					   $current_cat = isset($current_params['category1'])?$current_params['category1']:'';
					   $cat_level_2 = isset($current_params['category2'])?$current_params['category2']:'';
					}
					if( $route == 'frontend.game.list' ){
					   $category = VanguardDK\Category::where('parent', 0)->orderBy('position')->first();
						if( $category ){
							$current_cat = $category->href;
						}
					}
				@endphp				
				@foreach ($categories as $category)
					<li class="main-nav__item  @if ($category->href == $current_cat) main-nav__item_active @endif @if (count($category->inner) > 0) main-nav__item_subnav @endif">
						<a class="main-nav__link" href="{{ route('frontend.game.list.category', $category->href) }}">{{ $category->title }}</a>
						@if ( count($category->inner) > 0 )
							<ul class="main-nav__subnav subnav">
							@foreach ($category->inner as $inner)
								<li class="subnav__item">
									<a class="subnav__link @if ($inner->href == $cat_level_2 && $category->href == $current_cat) subnav__link_active @endif" 
										href="{{ route('frontend.game.list.category_level2', [$category->href, $inner->href]) }}">
										{{ $inner->title }}
									</a>
								</li>
							@endforeach
							</ul>
						@endif
					</li>
				@endforeach
            </ul>
        </div>
        <!-- MENU -->
    </div>
</div>

@include('frontend.partials.wins')
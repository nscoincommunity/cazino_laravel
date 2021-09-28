@extends('frontend.layouts.app')

@section('page-title', $title)
@section('body', ($body))
@section('keywords', $keywords)
@section('description', $description)

@section('content')
@include('frontend.partials.messages')

<!-- BLOCK WITH GAMES -->
<main class="section__main">
    <div class="main main_gallery">
        <div class="main__inner">
			@if (count($games))
				@foreach ($games as $game)
					<li class="main__item preview">
						<div class="preview__item">
							<img src="{{ $game->name ? '/ico/' . $game->name . '.png' : '' }}" class="preview__img" alt="{{ $game->title }}">
							<div class="preview__overlay">
								<div class="preview__action">
									@if ( Auth::check() )
										<a href="{{ route('frontend.game.go', $game->name) }}" class="preview__button button button_color_orange">Play</a>
									@else
										<a href="#login-modal" data-toggle="modal" class="preview__button button button_color_orange">Play</a>
									@endif
								</div>
							</div>
						</div>
						<div class="preview__info">
							<p class="preview__title">{{ $game->title }}</p>
						</div>
					</li>
				@endforeach
            @else
				@lang('app.no_records_found')
			@endif

        </div>
    </div>
</main>
<!-- BLOCK WITH GAMES -->
<!-- RIGHT UNIT -->


<!-- <aside class="section__aside">
	<div class="aside">
		<div class="aside__search">
			<form action="/search" method="get" id="search-form">
				<div class="search">
					<button type="submit" class="search__button" disabled="disabled"></button>
					<input placeholder="Find a game, for example Book Of Ra" name="q" class="search__input" value="">
				</div>
			</form>
		</div>
	</div>
</aside> -->
@stop

@section('scripts')
@stop

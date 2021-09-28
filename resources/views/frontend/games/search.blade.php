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
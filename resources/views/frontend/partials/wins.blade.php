@php 
	$detect = new VanguardDK\Lib\Mobile_Detect;
	$last_wins = VanguardDK\BotGame::where('game_id', '>', '0');
	
	if( $detect->isMobile() || $detect->isTablet() ){
		$last_wins = $last_wins->whereIn('device', [0,2]);
	}else{
		$last_wins = $last_wins->whereIn('device', [1,2]);
	}
	
	$last_wins = $last_wins->inRandomOrder()->take(6)->get();
	
	
@endphp
				
@if( !in_array( Route::currentRouteName(), ['frontend.points', 'frontend.page.view'] ) )
		
<section class="section section_winsline">
	<div class="winsline" id="tracker">
	@foreach($last_wins as $win)
		<a class="winsline__item" @if ( Auth::check() )href="{{ route('frontend.game.go', $win->game->name) }}" @else data-toggle="modal" data-target="#login-modal"@endif	>
			<div class="winsline__block">
				<img src="{{ $win->game->name ? '/ico/' . $win->game->name . '.png' : '' }}" alt="{{ $win->game->title }}" class="winsline__img">
				<div class="winsline__overlay">
					<button class="winsline__button button button_small">PLAY</button>
				</div>
				<div class="winsline__content">
					<p class="winsline__title">{{ $win->game->title }}</p>
					<p class="winsline__title winsline__title_color_yellow">{{ $win->win }} USD</p>
					<span class="winsline__note">{{ $win->date_time }}</span>
					<span class="winsline__note winsline__note_small">{{ $win->login }}</span>
				</div>
			</div>
		</a>
	@endforeach
	</div>
</section>	

@endif
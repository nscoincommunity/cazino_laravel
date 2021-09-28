<?php 
	$detect = new VanguardDK\Lib\Mobile_Detect;
	$last_wins = VanguardDK\BotGame::where('game_id', '>', '0');
	
	if( $detect->isMobile() || $detect->isTablet() ){
		$last_wins = $last_wins->whereIn('device', [0,2]);
	}else{
		$last_wins = $last_wins->whereIn('device', [1,2]);
	}
	
	$last_wins = $last_wins->inRandomOrder()->take(6)->get();
	
	
?>
				
<?php if( !in_array( Route::currentRouteName(), ['frontend.points', 'frontend.page.view'] ) ): ?>
		
<section class="section section_winsline">
	<div class="winsline" id="tracker">
	<?php $__currentLoopData = $last_wins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $win): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<a class="winsline__item" <?php if( Auth::check() ): ?>href="<?php echo e(route('frontend.game.go', $win->game->name)); ?>" <?php else: ?> data-toggle="modal" data-target="#login-modal"<?php endif; ?>	>
			<div class="winsline__block">
				<img src="<?php echo e($win->game->name ? '/ico/' . $win->game->name . '.png' : ''); ?>" alt="<?php echo e($win->game->title); ?>" class="winsline__img">
				<div class="winsline__overlay">
					<button class="winsline__button button button_small">PLAY</button>
				</div>
				<div class="winsline__content">
					<p class="winsline__title"><?php echo e($win->game->title); ?></p>
					<p class="winsline__title winsline__title_color_yellow"><?php echo e($win->win); ?> USD</p>
					<span class="winsline__note"><?php echo e($win->date_time); ?></span>
					<span class="winsline__note winsline__note_small"><?php echo e($win->login); ?></span>
				</div>
			</div>
		</a>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
</section>	

<?php endif; ?>
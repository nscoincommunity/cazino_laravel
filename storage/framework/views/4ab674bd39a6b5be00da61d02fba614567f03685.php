<?php if(count($games)): ?>
	<?php $__currentLoopData = $games; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $game): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<li class="main__item preview">
			<div class="preview__item">
				<img src="<?php echo e($game->name ? '/ico/' . $game->name . '.png' : ''); ?>" class="preview__img" alt="<?php echo e($game->title); ?>">
				<div class="preview__overlay">
					<div class="preview__action">
						<?php if( Auth::check() ): ?>
							<a href="<?php echo e(route('frontend.game.go', $game->name)); ?>" class="preview__button button button_color_orange">Play</a>
						<?php else: ?>
							<a href="#login-modal" data-toggle="modal" class="preview__button button button_color_orange">Play</a>
						<?php endif; ?>									
					</div>
				</div>
			</div>
			<div class="preview__info">
				<p class="preview__title"><?php echo e($game->title); ?></p>
			</div>
		</li>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
	<?php echo app('translator')->getFromJson('app.no_records_found'); ?>
<?php endif; ?>
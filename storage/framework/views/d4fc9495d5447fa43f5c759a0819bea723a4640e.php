<?php $__env->startSection('page-title', $title); ?>
<?php $__env->startSection('body', ($body)); ?>
<?php $__env->startSection('keywords', $keywords); ?>
<?php $__env->startSection('description', $description); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('frontend.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	
<!-- BLOCK WITH GAMES -->
<main class="section__main">
    <div class="main main_gallery">
        <div class="main__inner">
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
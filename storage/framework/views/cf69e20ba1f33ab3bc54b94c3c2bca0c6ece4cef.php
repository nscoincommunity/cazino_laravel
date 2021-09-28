<?php $__env->startSection('page-title', $page->title); ?>
<?php $__env->startSection('keywords', $page->keywords); ?>
<?php $__env->startSection('description', $page->description); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('frontend.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	
<!-- BLOCK WITH GAMES -->
<main class="section__main">			
	<div class="vipclub">
		<div class="vipclub__header">
			<h1 class="vipclub__title title title_font_huge"><?php echo e($page->title); ?></h1>
		</div>
		<div class="vipclub__content">
			
			<?php echo $page->body; ?>

			
			<div class="vipclub__row">
				<?php $__currentLoopData = \VanguardDK\Point::orderBy('rating', 'ASC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$cours): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="vipclub__item" data-target='#rate<?php echo e($k+1); ?>'>
					<div class="vip-panel">
						<div class="vip-panel__badge"><?php echo e($k+1); ?></div>
						<img src="/frontend/img/points/<?php echo e($cours->img); ?>" alt="<?php echo e($cours->name); ?>" class="vip-panel__img">
						<button class="vip-panel__button button button_color_brightblue"><?php echo e($cours->name); ?></button>
					</div>
				</div>
				<div class="vipclub__info" id="rate<?php echo e($k+1); ?>">
					<h3 class="vipclub__subtitle title"><?php echo e($cours->title); ?> <?php echo e($cours->name); ?></h3>
					<div class="vipclub__caption">
						<?php echo $cours->description; ?>

					</div>
					<span class="vipclub__arrow"></span>
				</div>
				<?php if($k%3==2): ?>
			</div>
			<div class="vipclub__row">
				<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
	</div>    
</main>
<style>
	.section_main:after{ width: 0; }
</style>
<!-- BLOCK WITH GAMES -->	
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
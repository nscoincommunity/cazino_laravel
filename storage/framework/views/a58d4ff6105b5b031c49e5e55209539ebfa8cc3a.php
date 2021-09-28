<?php $__env->startSection('page-title', $title); ?>
<?php $__env->startSection('body', ($body)); ?>
<?php $__env->startSection('keywords', $keywords); ?>
<?php $__env->startSection('description', $description); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('frontend.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="game-list show" data-game-type="top">
        <?php if(count($games)): ?>
            <?php $__currentLoopData = $games; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $game): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-1-6">
                <div class="game__box sign__up">
                    <div class="game__box__img__container">
                        <img ng-src="<?php echo e($game->name ? '/ico/' . $game->name . '.png' : ''); ?>"
                             src="<?php echo e(url('assets/_new-style/images/game-preloder.gif')); ?>"
                             class="preview__img"
                             alt="<?php echo e($game->title); ?>"
                        >
                    </div>
                    <div class="h-overlay">
                        <h4><?php echo e($game->title); ?></h4>
                        <?php if(Auth::check()): ?>
                            <a href="<?php echo e(route('frontend.game.go', $game->name)); ?>" class="games__button button-register">
                                <?php echo app('translator')->getFromJson('app.play'); ?>
                            </a>
                        <?php else: ?>
                            <div ng-click="openModal($event, '#login-modal')" class="games__button button-register">
                                <?php echo app('translator')->getFromJson('app.login'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <?php echo app('translator')->getFromJson('app.no_records_found'); ?>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend._new-style.layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
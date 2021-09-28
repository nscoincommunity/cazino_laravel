<?php $__env->startSection('page-title', trans('app.add_game')); ?>
<?php $__env->startSection('page-heading', trans('app.add_game')); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item">
        <a href="<?php echo e(route('backend.game.list')); ?>"><?php echo app('translator')->getFromJson('app.games'); ?></a>
    </li>
    <li class="breadcrumb-item active">
        <?php echo app('translator')->getFromJson('app.create'); ?>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('backend.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo Form::open(['route' => 'backend.game.store', 'files' => true, 'id' => 'user-form']); ?>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <h5 class="card-title">
                        <?php echo app('translator')->getFromJson('app.game_details'); ?>
                    </h5>
                    <p class="text-muted font-weight-light">
                        A general game information.
                    </p>
                </div>
                <div class="col-md-9">
                    <?php echo $__env->make('backend.games.partials.base', ['edit' => false, 'profile' => false], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
        </div>
    </div>
	
	<div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <h5 class="card-title">
                        Category
                    </h5>
                    <p class="text-muted font-weight-light">
                        A game category information.
                    </p>
                </div>
                <div class="col-md-9">
                    <?php echo $__env->make('backend.games.partials.category', ['edit' => false, 'profile' => false], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
        </div>
    </div>
	
	<div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <h5 class="card-title">
                        <?php echo app('translator')->getFromJson('app.game_match'); ?>
                    </h5>
                    <p class="text-muted font-weight-light">
                        A game match information.
                    </p>
                </div>
                <div class="col-md-9">
                    <?php echo $__env->make('backend.games.partials.match', ['edit' => false, 'profile' => false], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
        </div>
    </div>
	
	<div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <h5 class="card-title">
                        <?php echo app('translator')->getFromJson('app.game_jackpot'); ?>
                    </h5>
                    <p class="text-muted font-weight-light">
                        A game jackpot information.
                    </p>
                </div>
                <div class="col-md-9">
                    <?php echo $__env->make('backend.games.partials.jackpot', ['edit' => false, 'profile' => false], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
        </div>
    </div>
	
	<div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <h5 class="card-title">
                        Reel Strip
                    </h5>
                    <p class="text-muted font-weight-light">
                        A game Reel Strip information.
                    </p>
                </div>
                <div class="col-md-9">
                    <?php echo $__env->make('backend.games.partials.reel_strip', ['edit' => false, 'profile' => false], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
        </div>
    </div>
	
	<div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <h5 class="card-title">
                        Reel Strip Bonus
                    </h5>
                    <p class="text-muted font-weight-light">
                        A game Reel Strip Bonus information.
                    </p>
                </div>
                <div class="col-md-9">
                    <?php echo $__env->make('backend.games.partials.reel_strip_bonus', ['edit' => false, 'profile' => false], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">
                <?php echo app('translator')->getFromJson('app.add_game'); ?>
            </button>
        </div>
    </div>
<?php echo Form::close(); ?>


<br>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo HTML::script('assets/js/as/profile.js'); ?>

    <?php echo JsValidator::formRequest('VanguardDK\Http\Requests\Game\CreateGameRequest', '#user-form'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
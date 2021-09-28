<?php $__env->startSection('page-title', trans('app.bots_settings')); ?>
<?php $__env->startSection('page-heading', trans('app.bots_settings')); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item text-muted">
        <?php echo app('translator')->getFromJson('app.settings'); ?>
    </li>
    <li class="breadcrumb-item active">
        <?php echo app('translator')->getFromJson('app.bots'); ?>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('backend.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo Form::open(['route' => 'backend.settings.general.update', 'id' => 'general-settings-form']); ?>


<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="name"><?php echo app('translator')->getFromJson('app.bots_time'); ?></label>
                    <input type="text" class="form-control" id="bots_time"
                           name="bots_time" value="<?php echo e(settings('bots_time')); ?>">
                </div>
				<div class="form-group">
                    <label for="name"><?php echo app('translator')->getFromJson('app.bots_login'); ?></label>
                    <input type="text" class="form-control" id="bots_login"
                           name="bots_login" value="<?php echo e(settings('bots_login')); ?>">
                </div>
				<div class="form-group">
                    <label for="name"><?php echo app('translator')->getFromJson('app.bots_bet'); ?></label>
                    <input type="text" class="form-control" id="bots_bet"
                           name="bots_bet" value="<?php echo e(settings('bots_bet')); ?>">
                </div>
				<div class="form-group">
                    <label for="name"><?php echo app('translator')->getFromJson('app.bots_win'); ?></label>
                    <input type="text" class="form-control" id="bots_win"
                           name="bots_win" value="<?php echo e(settings('bots_win')); ?>">
                </div>
            </div>
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary">
    <?php echo app('translator')->getFromJson('app.update_settings'); ?>
</button>

<?php echo e(Form::close()); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
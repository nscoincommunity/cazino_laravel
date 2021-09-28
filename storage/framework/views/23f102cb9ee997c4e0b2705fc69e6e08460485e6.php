<?php $__env->startSection('page-title', trans('app.add_return')); ?>
<?php $__env->startSection('page-heading', trans('app.add_return')); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item">
        <a href="<?php echo e(route('backend.returns.list')); ?>"><?php echo app('translator')->getFromJson('app.returns'); ?></a>
    </li>
    <li class="breadcrumb-item active">
        <?php echo app('translator')->getFromJson('app.create'); ?>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('backend.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo Form::open(['route' => 'backend.returns.store', 'files' => true, 'id' => 'return-form']); ?>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <h5 class="card-title">
                        <?php echo app('translator')->getFromJson('app.return_details'); ?>
                    </h5>
                    <p class="text-muted font-weight-light">
                        A general return information.
                    </p>
                </div>
                <div class="col-md-9">
                    <?php echo $__env->make('backend.returns.partials.base', ['edit' => false, 'profile' => false], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
        </div>
    </div>

<button type="submit" class="btn btn-primary"><?php echo app('translator')->getFromJson('app.add_return'); ?></button>

<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
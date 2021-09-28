<?php $__env->startSection('page-title', trans('app.edit_point')); ?>
<?php $__env->startSection('page-heading', $point->title); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item">
        <a href="<?php echo e(route('backend.points.list')); ?>"><?php echo app('translator')->getFromJson('app.points'); ?></a>
    </li>
    <li class="breadcrumb-item">
        <?php echo e($point->title); ?>

    </li>
    <li class="breadcrumb-item active">
        <?php echo app('translator')->getFromJson('app.edit'); ?>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('backend.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo Form::open(['route' => array('backend.points.update', $point->id), 'files' => true, 'id' => 'point-form']); ?>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <h5 class="card-title">
                        <?php echo app('translator')->getFromJson('app.point_details'); ?>
                    </h5>
                    <p class="text-muted font-weight-light">
                        A general point information.
                    </p>
                </div>
                <div class="col-md-9">
                    <?php echo $__env->make('backend.points.partials.base', ['edit' => true], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
        </div>
    </div>
	
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">
                <?php echo app('translator')->getFromJson('app.edit_point'); ?>
            </button>
        </div>
    </div>
<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
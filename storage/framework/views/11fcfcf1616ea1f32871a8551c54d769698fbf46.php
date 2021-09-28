<?php $__env->startSection('page-title', trans('app.add_user')); ?>
<?php $__env->startSection('page-heading', trans('app.create_new_user')); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item">
        <a href="<?php echo e(route('backend.user.list')); ?>"><?php echo app('translator')->getFromJson('app.users'); ?></a>
    </li>
    <li class="breadcrumb-item active">
        <?php echo app('translator')->getFromJson('app.create'); ?>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('backend.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo Form::open(['route' => 'backend.user.store', 'files' => true, 'id' => 'user-form']); ?>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <h5 class="card-title">
                        <?php echo app('translator')->getFromJson('app.user_details'); ?>
                    </h5>
                    <p class="text-muted font-weight-light">
                        A general user profile information.
                    </p>
                </div>
                <div class="col-md-9">
                    <?php echo $__env->make('backend.user.partials.details', ['edit' => false, 'profile' => false], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <h5 class="card-title">
                        <?php echo app('translator')->getFromJson('app.login_details'); ?>
                    </h5>
                    <p class="text-muted font-weight-light">
                        Details used for authenticating with the application.
                    </p>
                </div>
                <div class="col-md-9">
                    <?php echo $__env->make('backend.user.partials.auth', ['edit' => false], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">
                <?php echo app('translator')->getFromJson('app.create_user'); ?>
            </button>
        </div>
    </div>
<?php echo Form::close(); ?>


<br>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo HTML::script('assets/js/as/profile.js'); ?>

    <?php echo JsValidator::formRequest('VanguardDK\Http\Requests\User\CreateUserRequest', '#user-form'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
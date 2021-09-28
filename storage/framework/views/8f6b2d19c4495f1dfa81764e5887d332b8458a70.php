<?php $__env->startSection('page-title', trans('app.notification_settings')); ?>
<?php $__env->startSection('page-heading', trans('app.notification_settings')); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item text-muted">
        <?php echo app('translator')->getFromJson('app.settings'); ?>
    </li>
    <li class="breadcrumb-item active">
        <?php echo app('translator')->getFromJson('app.notifications'); ?>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('backend.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="panel-heading"></div>
            <div class="card-body">
                <h5 class="card-title">
                    <?php echo app('translator')->getFromJson('app.email_notifications'); ?>
                </h5>

                <?php echo Form::open(['route' => 'backend.settings.notifications.update', 'id' => 'notification-settings-form']); ?>


                    <div class="form-group my-4">
                        <div class="d-flex align-items-center">
                            <div class="switch">
                                <input type="checkbox"
                                       name="notifications_signup_email"
                                       class="switch"
                                       value="1"
                                       id="switch-signup-email"
                                       <?php echo e(settings('notifications_signup_email') ? 'checked' : ''); ?>>

                                <label for="switch-signup-email"></label>
                            </div>
                            <div class="ml-3 d-flex flex-column">
                                <label class="mb-0"><?php echo app('translator')->getFromJson('app.sign_up_notification'); ?></label>
                                <small class="pt-0 text-muted">
                                    <?php echo app('translator')->getFromJson('app.notify_admin_when_user_signs_up'); ?>
                                </small>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">
                        <?php echo app('translator')->getFromJson('app.update_settings'); ?>
                    </button>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
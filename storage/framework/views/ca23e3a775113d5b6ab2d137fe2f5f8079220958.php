<?php $__env->startSection('page-title', trans('app.reset_password')); ?>

<?php $__env->startSection('content'); ?>

<div class="col-md-8 col-lg-6 col-xl-5 mx-auto my-10p">

    <div class="card mt-5">
        <div class="card-body">
            <h5 class="card-title text-center mt-4 mb-2 text-uppercase">
                <?php echo app('translator')->getFromJson('app.reset_your_password'); ?>
            </h5>

            <?php echo $__env->make('frontend.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <form role="form" action="<?php echo e(route('frontend.password.reset.post')); ?>" method="POST" id="reset-password-form" autocomplete="off" class="p-4">
                <input type="hidden" name="token" value="<?php echo e($token); ?>">
                <?php echo e(csrf_field()); ?>


                <p class="text-muted mb-4 text-center font-weight-light px-2">
                    <?php echo app('translator')->getFromJson('app.pick_new_password_below'); ?>
                </p>

                <div class="form-group">
                    <label for="password" class="sr-only"><?php echo app('translator')->getFromJson('app.your_email'); ?></label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="<?php echo app('translator')->getFromJson('app.your_email'); ?>">
                </div>

                <div class="form-group">
                    <label for="password" class="sr-only"><?php echo app('translator')->getFromJson('app.new_password'); ?></label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="<?php echo app('translator')->getFromJson('app.new_password'); ?>">
                </div>

                <div class="form-group">
                    <label for="password" class="sr-only"><?php echo app('translator')->getFromJson('app.confirm_new_password'); ?></label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="<?php echo app('translator')->getFromJson('app.confirm_new_password'); ?>">
                </div>

                <div class="form-group mt-5">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" id="btn-reset-password">
                        <?php echo app('translator')->getFromJson('app.update_password'); ?>
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo JsValidator::formRequest('VanguardDK\Http\Requests\Auth\PasswordResetRequest', '#reset-password-form'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
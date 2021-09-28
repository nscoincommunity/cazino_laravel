<?php $__env->startSection('page-title', trans('app.reset_password')); ?>

<?php $__env->startSection('content'); ?>

<div class="col-md-8 col-lg-6 col-xl-5 mx-auto my-10p">

    <div class="card mt-5">
        <div class="card-body">
            <h5 class="card-title text-center mt-4 mb-2 text-uppercase">
                <?php echo app('translator')->getFromJson('app.forgot_your_password'); ?>
            </h5>

            <?php echo $__env->make('backend.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <div class="p-4">
                <form role="form" action="<?= url('backend.password.remind') ?>" method="POST" id="remind-password-form" autocomplete="off">
                    <?php echo e(csrf_field()); ?>


                    <p class="text-muted mb-4 text-center font-weight-light">
                        <?php echo app('translator')->getFromJson('app.please_provide_your_email_below'); ?>
                    </p>

                    <div class="form-group password-field my-3">
                        <label for="password" class="sr-only"><?php echo app('translator')->getFromJson('app.email'); ?></label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="<?php echo app('translator')->getFromJson('app.your_email'); ?>">
                    </div>

                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" id="btn-reset-password">
                            <?php echo app('translator')->getFromJson('app.reset_password'); ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
        <div class="text-center text-muted">
            <?php if(settings('reg_enabled')): ?>
                <?php echo app('translator')->getFromJson('app.already_have_an_account'); ?>
                <a class="font-weight-bold" href="<?= url("backend.login") ?>"><?php echo app('translator')->getFromJson('app.login'); ?></a>
            <?php endif; ?>
        </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo JsValidator::formRequest('VanguardDK\Http\Requests\Auth\PasswordRemindRequest', '#remind-password-form'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
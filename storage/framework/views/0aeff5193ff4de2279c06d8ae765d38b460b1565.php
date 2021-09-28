<?php $__env->startSection('page-title', trans('app.edit_user')); ?>
<?php $__env->startSection('page-heading', $user->present()->nameOrEmail); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item">
        <a href="<?php echo e(route('backend.user.list')); ?>"><?php echo app('translator')->getFromJson('app.users'); ?></a>
    </li>
    <li class="breadcrumb-item">
        <a href="<?php echo e(route('backend.user.show', $user->id)); ?>">
            <?php echo e($user->present()->nameOrEmail); ?>

        </a>
    </li>
    <li class="breadcrumb-item active">
        <?php echo app('translator')->getFromJson('app.edit'); ?>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('backend.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs" id="nav-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active"
                           id="details-tab"
                           data-toggle="tab"
                           href="#details"
                           role="tab"
                           aria-controls="home"
                           aria-selected="true">
                            <?php echo app('translator')->getFromJson('app.user_details'); ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           id="authentication-tab"
                           data-toggle="tab"
                           href="#login-details"
                           role="tab"
                           aria-controls="home"
                           aria-selected="true">
                            <?php echo app('translator')->getFromJson('app.login_details'); ?>
                        </a>
                    </li>
                    <?php if(settings('2fa.enabled')): ?>
                        <li class="nav-item">
                            <a class="nav-link"
                               id="authentication-tab"
                               data-toggle="tab"
                               href="#2fa"
                               role="tab"
                               aria-controls="home"
                               aria-selected="true">
                                <?php echo app('translator')->getFromJson('app.two_factor_authentication'); ?>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>

                <div class="tab-content mt-4" id="nav-tabContent">
                    <div class="tab-pane fade show active px-2" id="details" role="tabpanel" aria-labelledby="nav-home-tab">
                        <?php echo Form::open(['route' => ['backend.user.update.details', $user->id], 'method' => 'PUT', 'id' => 'details-form']); ?>

                            <?php echo $__env->make('backend.user.partials.details', ['profile' => false], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo Form::close(); ?>

                    </div>

                    <div class="tab-pane fade px-2" id="login-details" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <?php echo Form::open(['route' => ['backend.user.update.login-details', $user->id], 'method' => 'PUT', 'id' => 'login-details-form']); ?>

                            <?php echo $__env->make('backend.user.partials.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo Form::close(); ?>

                    </div>

                    <?php if(settings('2fa.enabled')): ?>
                        <div class="tab-pane fade px-2" id="2fa" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <?php $route = Authy::isEnabled($user) ? 'disable' : 'enable'; ?>

                            <?php echo Form::open(['route' => ["backend.user.two-factor.{$route}", $user->id], 'id' => 'two-factor-form']); ?>

                                <?php echo $__env->make('backend.user.partials.two-factor', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php echo Form::close(); ?>

                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>

    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <?php echo Form::open(['route' => ['backend.user.update.avatar', $user->id], 'files' => true, 'id' => 'avatar-form']); ?>

                    <?php echo $__env->make('backend.user.partials.avatar', ['updateUrl' => route('backend.user.update.avatar.external', $user->id)], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo HTML::script('assets/js/as/btn.js'); ?>

    <?php echo HTML::script('assets/js/as/profile.js'); ?>

    <?php echo JsValidator::formRequest('VanguardDK\Http\Requests\User\UpdateDetailsRequest', '#details-form'); ?>

    <?php echo JsValidator::formRequest('VanguardDK\Http\Requests\User\UpdateLoginDetailsRequest', '#login-details-form'); ?>


    <?php if(settings('2fa.enabled')): ?>
        <?php echo JsValidator::formRequest('VanguardDK\Http\Requests\User\EnableTwoFactorRequest', '#two-factor-form'); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
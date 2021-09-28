<?php $__env->startSection('page-title', $user->present()->nameOrEmail . ' - ' . trans('app.active_sessions')); ?>

<?php $__env->startSection('page-heading'); ?>
    <?php echo app('translator')->getFromJson('app.sessions'); ?> (<?php echo e($user->present()->nameOrEmail); ?>)
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <?php if(isset($adminView)): ?>
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('backend.user.list')); ?>"><?php echo app('translator')->getFromJson('app.users'); ?></a>
        </li>

        <li class="breadcrumb-item">
            <a href="<?php echo e(route('backend.user.show', $user->id)); ?>">
                <?php echo e($user->present()->nameOrEmail); ?>

            </a>
        </li>
    <?php endif; ?>

    <li class="breadcrumb-item active">
        <?php echo app('translator')->getFromJson('app.sessions'); ?>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('backend.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-borderless table-striped">
                <thead>
                    <tr>
                        <th><?php echo app('translator')->getFromJson('app.ip_address'); ?></th>
                        <th><?php echo app('translator')->getFromJson('app.device'); ?></th>
                        <th><?php echo app('translator')->getFromJson('app.browser'); ?></th>
                        <th><?php echo app('translator')->getFromJson('app.last_activity'); ?></th>
                        <th class="text-center"><?php echo app('translator')->getFromJson('app.action'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($sessions)): ?>
                        <?php $__currentLoopData = $sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($session->ip_address); ?></td>
                                <td>
                                    <?php echo e($session->device ?: trans('app.unknown')); ?> (<?php echo e($session->platform ?: trans('app.unknown')); ?>)
                                </td>
                                <td><?php echo e($session->browser ?: trans('app.unknown')); ?></td>
                                <td><?php echo e($session->last_activity->format(config('app.date_time_format'))); ?></td>
                                <td class="text-center">
                                    <a href="<?php echo e(isset($profile) ? route('backend.profile.sessions.invalidate', $session->id) : route('backend.user.sessions.invalidate', [$user->id, $session->id])); ?>"
                                       class="btn btn-icon"
                                       title="<?php echo app('translator')->getFromJson('app.invalidate_session'); ?>"
                                       data-toggle="tooltip"
                                       data-placement="top"
                                       data-method="DELETE"
                                       data-confirm-title="<?php echo app('translator')->getFromJson('app.please_confirm'); ?>"
                                       data-confirm-text="<?php echo app('translator')->getFromJson('app.are_you_sure_invalidate_session'); ?>"
                                       data-confirm-delete="<?php echo app('translator')->getFromJson('app.yes_proceed'); ?>">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6"><em><?php echo app('translator')->getFromJson('app.no_records_found'); ?></em></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
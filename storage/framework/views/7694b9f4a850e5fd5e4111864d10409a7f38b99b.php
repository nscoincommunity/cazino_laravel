<?php $__env->startSection('page-title', $user->present()->nameOrEmail); ?>
<?php $__env->startSection('page-heading', $user->present()->nameOrEmail); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item">
        <a href="<?php echo e(route('backend.user.list')); ?>"><?php echo app('translator')->getFromJson('app.users'); ?></a>
    </li>
    <li class="breadcrumb-item active">
        <?php echo e($user->present()->nameOrEmail); ?>

    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-lg-5 col-xl-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <?php echo app('translator')->getFromJson('app.details'); ?>

                    <small class="float-right">
                        <a href="<?php echo e(route('backend.user.edit', $user->id)); ?>" class="edit"
                           data-toggle="tooltip" data-placement="top" title="<?php echo app('translator')->getFromJson('app.edit_user'); ?>">
                            <?php echo app('translator')->getFromJson('app.edit'); ?>
                        </a>
                    </small>
                </h5>

                <div class="d-flex align-items-center flex-column pt-3">
                    <div>
                        <img class="rounded-circle img-thumbnail img-responsive mb-4"
                             width="130"
                             height="130" src="<?php echo e($user->present()->avatar); ?>">
                    </div>

                    <?php if($name = $user->present()->name): ?>
                        <h5><?php echo e($user->present()->name); ?></h5>
                    <?php endif; ?>
                    <a href="mailto:<?php echo e($user->email); ?>" class="text-muted font-weight-light mb-2">
                        <?php echo e($user->email); ?>

                    </a>
                </div>

                <ul class="list-group list-group-flush mt-3">
                    <?php if($user->phone): ?>
                        <li class="list-group-item">
                            <strong><?php echo app('translator')->getFromJson('app.phone'); ?>:</strong>
                            <a href="telto:<?php echo e($user->phone); ?>"><?php echo e($user->phone); ?></a>
                        </li>
                    <?php endif; ?>
                    <li class="list-group-item">
                        <strong><?php echo app('translator')->getFromJson('app.birth'); ?>:</strong>
                        <?php echo e($user->present()->birthday); ?>

                    </li>
                    <li class="list-group-item">
                        <strong><?php echo app('translator')->getFromJson('app.address'); ?>:</strong>
                        <?php echo e($user->present()->fullAddress); ?>

                    </li>
                    <li class="list-group-item">
                        <strong><?php echo app('translator')->getFromJson('app.last_logged_in'); ?>:</strong>
                        <?php echo e($user->present()->lastLogin); ?>

                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-lg-7 col-xl-8">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <?php echo app('translator')->getFromJson('app.latest_activity'); ?>

                    <?php if(count($userActivities)): ?>
                        <small class="float-right">
                            <a href="<?php echo e(route('backend.activity.user', $user->id)); ?>" class="edit"
                               data-toggle="tooltip" data-placement="top" title="<?php echo app('translator')->getFromJson('app.complete_activity_log'); ?>">
                                <?php echo app('translator')->getFromJson('app.view_all'); ?>
                            </a>
                        </small>
                    <?php endif; ?>
                </h5>

                <?php if(count($userActivities)): ?>
                    <table class="table table-borderless table-striped">
                        <thead>
                        <tr>
                            <th><?php echo app('translator')->getFromJson('app.action'); ?></th>
                            <th><?php echo app('translator')->getFromJson('app.date'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $userActivities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($activity->description); ?></td>
                                <td><?php echo e($activity->created_at->format(config('app.date_time_format'))); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p class="text-muted font-weight-light"><em><?php echo app('translator')->getFromJson('app.no_activity_from_this_user_yet'); ?></em></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
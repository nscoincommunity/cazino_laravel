<tr>
    <td style="width: 50px;">
        <a href="<?php echo e(route('backend.user.show', $user->id)); ?>">
            <img
                class="rounded-circle img-responsive"
                width="50"
                src="<?php echo e($user->present()->avatar); ?>"
                alt="<?php echo e($user->present()->name); ?>">
        </a>
    </td>
    <td class="align-middle">
        <a href="<?php echo e(route('backend.user.show', $user->id)); ?>">
            <?php echo e($user->username ?: trans('app.n_a')); ?>

        </a>
    </td>
    <td class="align-middle"><?php echo e($user->email); ?></td>
	
	<?php if (\Auth::user()->hasPermission('users.balance.manage')) : ?>
	<td class="align-middle"><a href="/user/<?php echo e($user->id); ?>/stat"><?php echo e($user->balance); ?></a></td>
	<td class="align-middle"><a class="newPayment addPayment btn btn-icon" href="#" data-toggle="modal" data-target="#openAddModal" data-id="<?php echo e($user->id); ?>" ><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
	<td class="align-middle"><a class="newPayment outPayment btn btn-icon" href="#" data-toggle="modal" data-target="#openOutModal" data-id="<?php echo e($user->id); ?>" ><i class="fa fa-minus-circle" aria-hidden="true"></i></a></td>
    <?php endif; ?>
	
	<td class="align-middle">
        <span class="badge badge-lg badge-<?php echo e($user->present()->labelClass); ?>">
            <?php echo e(trans("app.{$user->status}")); ?>

        </span>
    </td>
    <td class="text-center align-middle">
        <div class="dropdown show d-inline-block">
            <a class="btn btn-icon"
               href="#" role="button" id="dropdownMenuLink"
               data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-h"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                <?php if(config('session.driver') == 'database'): ?>
                    <a href="<?php echo e(route('backend.user.sessions', $user->id)); ?>" class="dropdown-item text-gray-500">
                        <i class="fas fa-list mr-2"></i>
                        <?php echo app('translator')->getFromJson('app.user_sessions'); ?>
                    </a>
                <?php endif; ?>
                <a href="<?php echo e(route('backend.user.show', $user->id)); ?>" class="dropdown-item text-gray-500">
                    <i class="fas fa-eye mr-2"></i>
                    <?php echo app('translator')->getFromJson('app.view_user'); ?>
                </a>
            </div>
        </div>

        <a href="<?php echo e(route('backend.user.edit', $user->id)); ?>"
           class="btn btn-icon edit"
           title="<?php echo app('translator')->getFromJson('app.edit_user'); ?>"
           data-toggle="tooltip" data-placement="top">
            <i class="fas fa-edit"></i>
        </a>
		
		<?php if (\Auth::user()->hasPermission('users.delete')) : ?>
        <a href="<?php echo e(route('backend.user.delete', $user->id)); ?>"
           class="btn btn-icon"
           title="<?php echo app('translator')->getFromJson('app.delete_user'); ?>"
           data-toggle="tooltip"
           data-placement="top"
           data-method="DELETE"
           data-confirm-title="<?php echo app('translator')->getFromJson('app.please_confirm'); ?>"
           data-confirm-text="<?php echo app('translator')->getFromJson('app.are_you_sure_delete_user'); ?>"
           data-confirm-delete="<?php echo app('translator')->getFromJson('app.yes_delete_him'); ?>">
            <i class="fas fa-trash"></i>
        </a>
		<?php endif; ?>
    </td>
</tr>
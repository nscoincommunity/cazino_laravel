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
            <?php echo e($stat->admin ? $stat->admin->username : $stat->system); ?>

    </td>
	<td class="align-middle">
		<?php if($stat->type == 'add'): ?>
			<span class="badge badge-lg badge-primary">
		<?php else: ?>
			<span class="badge badge-lg badge-danger">
		<?php endif; ?>
		
		<?php echo e(abs($stat->summ)); ?>

		</span>
		
	</td>
	<td class="align-middle"><?php echo e($stat->user->username); ?></td>
    <td class="align-middle"><?php echo e($stat->created_at->format(config('app.date_format'))); ?></td>
    
</tr>
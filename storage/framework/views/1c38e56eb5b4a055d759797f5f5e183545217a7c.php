<tr>
    
	<td class="align-middle"><?php if( $stat->user ): ?><?php echo e($stat->user->username); ?> <?php else: ?> <?php echo e($stat->system); ?> <?php endif; ?></td>
	<td class="align-middle"><?php echo e($stat->type); ?></td>
	<td class="align-middle"><?php echo e($stat->summ); ?></td>
	<td class="align-middle"><?php echo e($stat->created_at); ?></td>
    
</tr>
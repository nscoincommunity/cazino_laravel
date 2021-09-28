<tr>
    <td class="align-middle">
            <img
                class="img-responsive"
                width="80"
                src="<?php echo e($stat->game ? '/ico/' . $stat->name_ico() . '.png' : ''); ?>"
                alt="<?php echo e($stat->game); ?>"> 
    </td>
    <td class="align-middle"><?php echo e($stat->game); ?></td>
	<td class="align-middle"><?php echo e($stat->user->username); ?></td>
	<td class="align-middle"><?php echo e($stat->balance); ?></td>
	<td class="align-middle"><?php echo e($stat->bet); ?></td>
	<td class="align-middle"><?php echo e($stat->win); ?></td>
	<td class="align-middle"><?php echo e($stat->date_time); ?></td>
    
</tr>
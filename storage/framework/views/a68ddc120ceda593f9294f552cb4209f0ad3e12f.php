<tr>
    <td style="width: 50px;">
        <?php echo e($item->created_at); ?>

    </td>
    <td class="align-middle">
        <?php echo e($item->summ); ?>

    </td>
	<td class="align-middle">
		<?php echo e($item->system); ?>

	</td>
	<td class="align-middle">
		<?php if($item->status == 1): ?>
			Success
		<?php elseif( $item->status == -1 ): ?>
			Fail
		<?php else: ?>
			Waiting
		<?php endif; ?>
	</td>
    
</tr>
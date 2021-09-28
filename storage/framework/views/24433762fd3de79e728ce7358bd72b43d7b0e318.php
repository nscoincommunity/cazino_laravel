<tr>        
    <td class="align-middle"><?php echo e($return->min_pay); ?></td>
	<td class="align-middle"><?php echo e($return->max_pay); ?></td> 
	<td class="align-middle"><?php echo e($return->percent); ?></td>
    <td class="text-center align-middle">
        
        <a href="<?php echo e(route('backend.returns.edit', $return->id)); ?>"
           class="btn btn-icon edit"
           title="<?php echo app('translator')->getFromJson('app.edit_return'); ?>"
           data-toggle="tooltip" data-placement="top">
            <i class="fas fa-edit"></i>
        </a>
        <a href="<?php echo e(route('backend.returns.delete', $return->id)); ?>"
           class="btn btn-icon"
           title="<?php echo app('translator')->getFromJson('app.delete_return'); ?>"
           data-toggle="tooltip"
           data-placement="top"
           data-method="DELETE"
           data-confirm-title="<?php echo app('translator')->getFromJson('app.please_confirm'); ?>"
           data-confirm-text="<?php echo app('translator')->getFromJson('app.are_you_sure_delete_return'); ?>"
           data-confirm-delete="<?php echo app('translator')->getFromJson('app.yes_delete_him'); ?>">
            <i class="fas fa-trash"></i>
        </a>
    </td>
</tr>
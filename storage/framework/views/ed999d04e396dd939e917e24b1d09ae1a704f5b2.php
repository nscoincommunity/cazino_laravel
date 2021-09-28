<tr>        
    <td class="align-middle"><?php echo e($point->rating); ?></td>
	<td class="align-middle"><?php echo e($point->name); ?></td> 
	<td class="align-middle"><?php echo e($point->sum); ?></td>
	<td class="align-middle"><?php echo e($point->bonus); ?></td> 
	<td class="align-middle"><?php echo e($point->exchange); ?></td>
    <td class="text-center align-middle">
        
        <a href="<?php echo e(route('backend.points.edit', $point->id)); ?>"
           class="btn btn-icon edit"
           title="<?php echo app('translator')->getFromJson('app.edit_point'); ?>"
           data-toggle="tooltip" data-placement="top">
            <i class="fas fa-edit"></i>
        </a>
        <a href="<?php echo e(route('backend.points.delete', $point->id)); ?>"
           class="btn btn-icon"
           title="<?php echo app('translator')->getFromJson('app.delete_point'); ?>"
           data-toggle="tooltip"
           data-placement="top"
           data-method="DELETE"
           data-confirm-title="<?php echo app('translator')->getFromJson('app.please_confirm'); ?>"
           data-confirm-text="<?php echo app('translator')->getFromJson('app.are_you_sure_delete_point'); ?>"
           data-confirm-delete="<?php echo app('translator')->getFromJson('app.yes_delete_him'); ?>">
            <i class="fas fa-trash"></i>
        </a>
    </td>
</tr>
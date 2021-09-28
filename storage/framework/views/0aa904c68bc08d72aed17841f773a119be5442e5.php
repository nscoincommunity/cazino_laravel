<tr>        
    <td class="align-middle"><span class=" <?php if($base): ?> badge badge-lg badge-primary <?php else: ?> badge badge-lg badge-secondary <?php endif; ?> "><?php echo e($category->title); ?></span></td>
	<td class="align-middle"><?php echo e($category->position); ?></td>
	<td class="align-middle"><?php if(!$base): ?>/<?php echo e($category->parentOne->href); ?><?php endif; ?>/<?php echo e($category->href); ?>/</td>   
    <td class="text-center align-middle">
        
        <a href="<?php echo e(route('backend.category.edit', $category->id)); ?>"
           class="btn btn-icon edit"
           title="<?php echo app('translator')->getFromJson('app.edit_game'); ?>"
           data-toggle="tooltip" data-placement="top">
            <i class="fas fa-edit"></i>
        </a>
        <a href="<?php echo e(route('backend.category.delete', $category->id)); ?>"
           class="btn btn-icon"
           title="<?php echo app('translator')->getFromJson('app.delete_category'); ?>"
           data-toggle="tooltip"
           data-placement="top"
           data-method="DELETE"
           data-confirm-title="<?php echo app('translator')->getFromJson('app.please_confirm'); ?>"
           data-confirm-text="<?php echo app('translator')->getFromJson('app.are_you_sure_delete_category'); ?>"
           data-confirm-delete="<?php echo app('translator')->getFromJson('app.yes_delete_him'); ?>">
            <i class="fas fa-trash"></i>
        </a>
    </td>
</tr>
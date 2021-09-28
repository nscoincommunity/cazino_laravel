<tr>        
    <td class="align-middle"><?php echo e($page->title); ?></td>
	<td class="align-middle"><?php echo e($page->path); ?></td>   
	<td class="align-middle"><?php echo e($page->view ? 'Active' : 'Disabled'); ?></td>   
    <td class="text-center align-middle">
        
        <a href="<?php echo e(route('backend.pages.edit', $page->id)); ?>"
           class="btn btn-icon edit"
           title="<?php echo app('translator')->getFromJson('app.edit_game'); ?>"
           data-toggle="tooltip" data-placement="top">
            <i class="fas fa-edit"></i>
        </a>
		<?php if( $page->type == 2 ): ?>
        <a href="<?php echo e(route('backend.pages.delete', $page->id)); ?>"
           class="btn btn-icon"
           title="<?php echo app('translator')->getFromJson('app.delete_page'); ?>"
           data-toggle="tooltip"
           data-placement="top"
           data-method="DELETE"
           data-confirm-title="<?php echo app('translator')->getFromJson('app.please_confirm'); ?>"
           data-confirm-text="<?php echo app('translator')->getFromJson('app.are_you_sure_delete_page'); ?>"
           data-confirm-delete="<?php echo app('translator')->getFromJson('app.yes_delete_him'); ?>">
            <i class="fas fa-trash"></i>
        </a>
		<?php endif; ?>
    </td>
</tr>
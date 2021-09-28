<tr>        
    <td class="align-middle"><?php echo e($jackpot->name); ?></td>
	<td class="align-middle"><?php echo e($jackpot->balance); ?></td> 
	<td class="align-middle"><a class="addPayment btn btn-icon" href="#" data-toggle="modal" data-target="#openAddModal" data-id="<?php echo e($jackpot->id); ?>" ><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
	<td class="align-middle"><a class="outPayment btn btn-icon" href="#" data-toggle="modal" data-target="#openOutModal" data-id="<?php echo e($jackpot->id); ?>" ><i class="fa fa-minus-circle" aria-hidden="true"></i></a></td>
	<td class="align-middle"><?php echo e($jackpot->pay_sum); ?></td>
	<td class="align-middle"><?php echo e($jackpot->percent); ?></td>
    <td class="text-center align-middle">
        
        <a href="<?php echo e(route('backend.jackpot.edit', $jackpot->id)); ?>"
           class="btn btn-icon edit"
           title="<?php echo app('translator')->getFromJson('app.edit_jackpot'); ?>"
           data-toggle="tooltip" data-placement="top">
            <i class="fas fa-edit"></i>
        </a>
        <a href="<?php echo e(route('backend.jackpot.delete', $jackpot->id)); ?>"
           class="btn btn-icon"
           title="<?php echo app('translator')->getFromJson('app.delete_jackpot'); ?>"
           data-toggle="tooltip"
           data-placement="top"
           data-method="DELETE"
           data-confirm-title="<?php echo app('translator')->getFromJson('app.please_confirm'); ?>"
           data-confirm-text="<?php echo app('translator')->getFromJson('app.are_you_sure_delete_jackpot'); ?>"
           data-confirm-delete="<?php echo app('translator')->getFromJson('app.yes_delete_him'); ?>">
            <i class="fas fa-trash"></i>
        </a>
    </td>
</tr>
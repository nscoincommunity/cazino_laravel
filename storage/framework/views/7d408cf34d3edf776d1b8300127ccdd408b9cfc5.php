<tr>
    <td class="align-middle">
            <img
                class="img-responsive"
                width="80"
                src="<?php echo e($game->name ? '/ico/' . $game->name_ico() . '.png' : ''); ?>"
                alt="<?php echo e($game->title); ?>">
    </td>
    
    <td class="align-middle"><a href="<?php echo e(route('backend.game.edit', $game->id)); ?>"><?php echo e($game->title); ?></a></td>
	<td class="align-middle"><?php echo e($game->gamebank); ?></td>
	<td class="align-middle"><?php echo e($game->percent); ?></td>
	<td class="align-middle"><?php echo e($game->garant_win); ?></td>
	<td class="align-middle"><?php echo e($game->garant_bonus); ?></td>
	<td class="align-middle"><?php echo e($game->winline); ?></td>
	<td class="align-middle"><?php echo e($game->winbonus); ?></td>    
    <td class="text-center align-middle">
        
        <a href="<?php echo e(route('backend.game.edit', $game->id)); ?>"
           class="btn btn-icon edit"
           title="<?php echo app('translator')->getFromJson('app.edit_game'); ?>"
           data-toggle="tooltip" data-placement="top">
            <i class="fas fa-edit"></i>
        </a>
        <a href="<?php echo e(route('backend.game.delete', $game->id)); ?>"
           class="btn btn-icon"
           title="<?php echo app('translator')->getFromJson('app.delete_game'); ?>"
           data-toggle="tooltip"
           data-placement="top"
           data-method="DELETE"
           data-confirm-title="<?php echo app('translator')->getFromJson('app.please_confirm'); ?>"
           data-confirm-text="<?php echo app('translator')->getFromJson('app.are_you_sure_delete_game'); ?>"
           data-confirm-delete="<?php echo app('translator')->getFromJson('app.yes_delete_him'); ?>">
            <i class="fas fa-trash"></i>
        </a>
    </td>
<td class="text-center align-middle">
    <div class="custom-control custom-checkbox">
        <input class="custom-control-input" id="cb-[<?php echo e($game->id); ?>]" name="checkbox[<?php echo e($game->id); ?>]" type="checkbox">
        <label class="custom-control-label d-inline" for="cb-[<?php echo e($game->id); ?>]">&nbsp;</label>
    </div>
</td>
</tr>
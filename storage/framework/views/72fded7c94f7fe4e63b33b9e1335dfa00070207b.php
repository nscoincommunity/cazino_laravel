<div class="row">
    <div class="col-md-6">
		<?php if(!$edit || $game->winline !== ''): ?>
		<div class="form-group">
            <label for="winline"><?php echo app('translator')->getFromJson('app.winline'); ?></label>
            <input type="text" class="form-control" id="winline"
                   name="winline" placeholder="<?php echo app('translator')->getFromJson('app.winline'); ?>" value="<?php echo e($edit ? $game->winline : ''); ?>" required>
        </div>
		<?php endif; ?>
		<?php if(!$edit || $game->winbonus !== ''): ?>
		<div class="form-group">
            <label for="winbonus"><?php echo app('translator')->getFromJson('app.winbonus'); ?></label>
            <input type="text" class="form-control" id="winbonus"
                   name="winbonus" placeholder="<?php echo app('translator')->getFromJson('app.winbonus'); ?>" value="<?php echo e($edit ? $game->winbonus : ''); ?>" required>
        </div>	
		<?php endif; ?>
		<?php if(!$edit || $game->gamebank !== ''): ?>
		<div class="form-group">
            <label for="gamebank"><?php echo app('translator')->getFromJson('app.gamebank'); ?></label>
            <input type="text" class="form-control" id="gamebank"
                   name="gamebank" placeholder="<?php echo app('translator')->getFromJson('app.gamebank'); ?>" value="<?php echo e($edit ? $game->gamebank : ''); ?>" required>
        </div>
		<?php endif; ?>
    </div>

    <div class="col-md-6">  
		<?php if(!$edit || $game->garant_win !== ''): ?>
        <div class="form-group">
            <label for="garant_win"><?php echo app('translator')->getFromJson('app.garant_win'); ?></label>
            <input type="text" class="form-control" id="percent"
                   name="garant_win" placeholder="<?php echo app('translator')->getFromJson('app.garant_win'); ?>" value="<?php echo e($edit ? $game->garant_win : ''); ?>" required>
        </div>
		<?php endif; ?>
		<?php if(!$edit || $game->garant_bonus !== ''): ?>
		<div class="form-group">
            <label for="garant_bonus"><?php echo app('translator')->getFromJson('app.garant_bonus'); ?></label>
            <input type="text" class="form-control" id="garant_bonus"
                   name="garant_bonus" placeholder="<?php echo app('translator')->getFromJson('app.garant_bonus'); ?>" value="<?php echo e($edit ? $game->garant_bonus : ''); ?>" required>
        </div>
		<?php endif; ?>
    </div>
	
	<hr>
	
	<?php if(!$edit || $game->game_win->winline !== ''): ?>
	<div class="col-md-6">
		<div class="form-group">
            <label for="winline"><?php echo app('translator')->getFromJson('app.match_winline'); ?></label>
			<textarea class="form-control" id="match_winline" name="match_winline" rows="10" required><?php echo e($edit ? $game->game_win->winline : ''); ?></textarea>
        </div>
    </div>
	<?php endif; ?>
	<?php if(!$edit || $game->game_win->winbonus !== ''): ?>
	<div class="col-md-6">
		<div class="form-group">
            <label for="match_winbonus"><?php echo app('translator')->getFromJson('app.match_winbonus'); ?></label>
			<textarea class="form-control" id="match_winbonus" name="match_winbonus" rows="10" required><?php echo e($edit ? $game->game_win->winbonus : ''); ?></textarea>
        </div>
    </div>
	<?php endif; ?>
	
	

    <?php if($edit): ?>
        <div class="col-md-12 mt-2">
            <button type="submit" class="btn btn-primary" id="update-details-btn">
                <i class="fa fa-refresh"></i>
                <?php echo app('translator')->getFromJson('app.update_details'); ?>
            </button>
        </div>
    <?php endif; ?>
</div>

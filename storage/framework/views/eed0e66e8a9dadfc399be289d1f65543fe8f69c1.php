 <div class="row">
    <div class="col-md-6">
		<?php if(!$edit || $game->name !== ''): ?>
		<div class="form-group">
            <label for="name"><?php echo app('translator')->getFromJson('app.name'); ?></label>
            <input type="text" class="form-control" id="name"
                   name="name" placeholder="<?php echo app('translator')->getFromJson('app.name'); ?>" <?php echo e($edit ? 'disabled' : ''); ?> value="<?php echo e($edit ? $game->name : ''); ?>" required>
        </div>
		<?php endif; ?>
		<?php if(!$edit || $game->title !== ''): ?>
		<div class="form-group">
            <label for="title"><?php echo app('translator')->getFromJson('app.title'); ?></label>
            <input type="text" class="form-control" id="title"
                   name="title" placeholder="<?php echo app('translator')->getFromJson('app.title'); ?>" value="<?php echo e($edit ? $game->title : ''); ?>" required>
        </div>
		<?php endif; ?>
		<?php if(!$edit || $game->cask !== ''): ?>
		<div class="form-group">
            <label for="cask"><?php echo app('translator')->getFromJson('app.cask'); ?></label>
            <input type="number" class="form-control" id="cask"
                   name="cask" placeholder="<?php echo app('translator')->getFromJson('app.cask'); ?>" value="<?php echo e($edit ? $game->cask : ''); ?>" required>
        </div>
		<?php endif; ?>
		<div class="form-group">
            <label for="device"><?php echo app('translator')->getFromJson('app.device'); ?></label>
			<select name="device" id="device" class="form-control" required>
				<option value="0" <?php echo e(($edit && !$game->device==0)? 'selected="selected"' : ''); ?>>Mobile</option>
				<option value="1" <?php echo e(($edit && $game->device==1)? 'selected="selected"' : ''); ?>>Desktop</option>
				<option value="2" <?php echo e(($edit && $game->device==2)? 'selected="selected"' : ''); ?>>Mobile + Desktop</option>
			</select>
        </div>		
		
    </div>

    <div class="col-md-6">        
        <?php if(!$edit || $game->rezerv !== ''): ?>
        <div class="form-group">
            <label for="rezerv"><?php echo app('translator')->getFromJson('app.rezerv'); ?></label>
            <input type="number" class="form-control" id="rezerv"
                   name="rezerv" placeholder="<?php echo app('translator')->getFromJson('app.rezerv'); ?>" value="<?php echo e($edit ? $game->rezerv : ''); ?>" required>
        </div>		
		<?php endif; ?>
		<?php if(!$edit || $game->percent !== ''): ?>
		<div class="form-group">
            <label for="percent"><?php echo app('translator')->getFromJson('app.percent'); ?></label>
            <input type="number" class="form-control" id="percent"
                   name="percent" placeholder="<?php echo app('translator')->getFromJson('app.percent'); ?>" value="<?php echo e($edit ? $game->percent : ''); ?>" required>
        </div>
		<?php endif; ?>
		
		<?php if(!$edit || $game->monitor !== ''): ?>
		<div class="form-group">
            <label for="monitor"><?php echo app('translator')->getFromJson('app.monitor'); ?></label>
            <select name="monitor" id="monitor" class="form-control" required>
				<option value="1" <?php echo e($edit && $game->monitor == 1? 'selected="selected"' : ''); ?>>1</option>
				<option value="2" <?php echo e($edit && $game->monitor == 2? 'selected="selected"' : ''); ?>>2</option>
			</select>
        </div>
		<?php endif; ?>
        
		<div class="form-group">
            <label for="view"><?php echo app('translator')->getFromJson('app.view'); ?></label>
			<select name="view" id="view" class="form-control">
				<option value="1" <?php echo e($edit && $game->view? 'selected="selected"' : ''); ?>>Active</option>
				<option value="0" <?php echo e($edit && !$game->view? 'selected="selected"' : ''); ?>>Disabled</option>
			</select>
        </div>
		
    </div>
	
	<hr>
	
	<?php if(!$edit || $game->gameline !== ''): ?>
	<div class="col-md-6">
		<div class="form-group">
            <label for="gameline">Game Line</label>
			<textarea class="form-control" id="gameline" name="gameline" placeholder="Game Line" rows="2" required><?php echo e($edit ? $game->gameline : ''); ?></textarea>
        </div>
    </div>
	<?php endif; ?>
	
	<?php if(!$edit || $game->bet !== ''): ?>
	<div class="col-md-6">
		<div class="form-group">
            <label for="bet">Game Bet</label>
			<textarea class="form-control" id="bet" name="bet" placeholder="Game Bet" rows="2" required><?php echo e($edit ? $game->bet : ''); ?></textarea>
        </div>
    </div>
	<?php endif; ?>
	
	<div class="col-md-6">
		<div class="form-group">
            <label for="scaleMode">Scaling</label>
			<select name="scaleMode" id="scaleMode" class="form-control" required>
				<option value="showAll" <?php echo e($edit && $game->scaleMode=='showAll'? 'selected="selected"' : ''); ?>>Default</option>
				<option value="exactFit" <?php echo e($edit && $game->scaleMode=='exactFit'? 'selected="selected"' : ''); ?>>Full Screen</option>
			</select>
        </div>
		<?php if(!$edit || $game->slotViewState !== ''): ?>
		<div class="form-group">
            <label for="slotViewState">Game UI</label>
			<select name="slotViewState" id="slotViewState" class="form-control" required>
				<option value="Normal" <?php echo e($edit && $game->slotViewState=='Normal'? 'selected="selected"' : ''); ?>>Visible UI</option>
				<option value="HideUI" <?php echo e($edit && $game->slotViewState=='HideUI'? 'selected="selected"' : ''); ?>>Hide UI</option>
			</select>
        </div>
		<?php endif; ?>
		
		<?php if(!$edit || $game->ReelsMath !== ''): ?>
		<div class="form-group">
            <label for="ReelsMath">Match</label>
			<select name="ReelsMath" id="ReelsMath" class="form-control" required>
				<option value="0" <?php echo e($edit && $game->ReelsMath=='0'? 'selected="selected"' : ''); ?>>Original</option>
				<option value="1" <?php echo e($edit && $game->ReelsMath=='1'? 'selected="selected"' : ''); ?>>Default</option>
			</select>
        </div>
		<?php endif; ?>
	</div>
	<div class="col-md-6">	
		<div class="form-group">
            <label for="numFloat">Num Float</label>
			<select name="numFloat" id="numFloat" class="form-control" required>
				<option value="0" <?php echo e($edit && !$game->numFloat? 'selected="selected"' : ''); ?>>0</option>
				<option value="1" <?php echo e($edit && $game->numFloat? 'selected="selected"' : ''); ?>>0.00</option>
			</select>
        </div>
	</div>
		

    <?php if($edit): ?>
        <div class="col-md-12 mt-2">
            <button type="submit" class="btn btn-primary" id="update-details-btn">
                <i class="fa fa-refresh"></i>
                <?php echo app('translator')->getFromJson('app.update_details'); ?>
            </button>
        </div>
    <?php endif; ?>
</div>

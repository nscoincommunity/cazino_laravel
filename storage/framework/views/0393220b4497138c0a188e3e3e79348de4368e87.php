<div class="row">
    
	<?php if(!$edit || $gamereel->reelStrip1 !== ''): ?>
	<div class="col-md-6">
		<div class="form-group">
            <label for="reelStrip1">Reel Strip 1</label>
			<textarea class="form-control" id="reelStrip1" name="reelStrip1" placeholder="Reel Strip 1" rows="8" required><?php echo e($edit ? $gamereel->reelStrip1 : ''); ?></textarea>
        </div>
    </div>
	<?php endif; ?>
	<?php if(!$edit || $gamereel->reelStrip2 !== ''): ?>
	<div class="col-md-6">
		<div class="form-group">
            <label for="reelStrip2">Reel Strip 2</label>
			<textarea class="form-control" id="reelStrip2" name="reelStrip2" placeholder="Reel Strip 2" rows="8" required><?php echo e($edit ? $gamereel->reelStrip2 : ''); ?></textarea>
        </div>
    </div>
	<?php endif; ?>
	<?php if(!$edit || $gamereel->reelStrip3 !== ''): ?>
	<div class="col-md-6">
		<div class="form-group">
            <label for="reelStrip3">Reel Strip 3</label>
			<textarea class="form-control" id="reelStrip3" name="reelStrip3" placeholder="Reel Strip 3" rows="8" required><?php echo e($edit ? $gamereel->reelStrip3 : ''); ?></textarea>
        </div>
    </div>
	<?php endif; ?>
	<?php if(!$edit || $gamereel->reelStrip4 !== ''): ?>
	<div class="col-md-6">
		<div class="form-group">
            <label for="reelStrip4">Reel Strip 4</label>
			<textarea class="form-control" id="reelStrip4" name="reelStrip4" placeholder="Reel Strip 4" rows="8" required><?php echo e($edit ? $gamereel->reelStrip4 : ''); ?></textarea>
        </div>
    </div>
	<?php endif; ?>
	<?php if(!$edit || $gamereel->reelStrip5 !== ''): ?>
	<div class="col-md-6">
		<div class="form-group">
            <label for="reelStrip5">Reel Strip 5</label>
			<textarea class="form-control" id="reelStrip5" name="reelStrip5" placeholder="Reel Strip 5" rows="8" required><?php echo e($edit ? $gamereel->reelStrip5 : ''); ?></textarea>
        </div>
    </div>
	<?php endif; ?>
	<?php if(!$edit || $gamereel->reelStrip6 !== ''): ?>
	<div class="col-md-6">
		<div class="form-group">
            <label for="reelStrip6">Reel Strip 6</label>
			<textarea class="form-control" id="reelStrip6" name="reelStrip6" placeholder="Reel Strip 6" rows="8" required><?php echo e($edit ? $gamereel->reelStrip6 : ''); ?></textarea>
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
<div class="row">
    <div class="col-md-6">		
		<?php if(!$edit || $game->jp_1 !== ''): ?>
		<div class="form-group">
            <label for="jp_1"><?php echo app('translator')->getFromJson('app.jp_1'); ?></label>
            <input type="text" class="form-control" id="jp_1"
                   name="jp_1" placeholder="<?php echo app('translator')->getFromJson('app.jp_1'); ?>" value="<?php echo e($edit ? $game->jp_1 : ''); ?>" required>
        </div>
		<?php endif; ?>
		<?php if(!$edit || $game->jp_2 !== ''): ?>
		<div class="form-group">
            <label for="jp_2"><?php echo app('translator')->getFromJson('app.jp_2'); ?></label>
            <input type="text" class="form-control" id="jp_2"
                   name="jp_2" placeholder="<?php echo app('translator')->getFromJson('app.jp_2'); ?>" value="<?php echo e($edit ? $game->jp_2 : ''); ?>" required>
        </div>
		<?php endif; ?>
		<?php if(!$edit || $game->jp_3 !== ''): ?>
		<div class="form-group">
            <label for="jp_3"><?php echo app('translator')->getFromJson('app.jp_3'); ?></label>
            <input type="text" class="form-control" id="jp_3"
                   name="jp_3" placeholder="<?php echo app('translator')->getFromJson('app.jp_3'); ?>" value="<?php echo e($edit ? $game->jp_3 : ''); ?>" required>
        </div>
		<?php endif; ?>
		<?php if(!$edit || $game->jp_4 !== ''): ?>
		<div class="form-group">
            <label for="jp_4"><?php echo app('translator')->getFromJson('app.jp_4'); ?></label>
            <input type="text" class="form-control" id="jp_4"
                   name="jp_4" placeholder="<?php echo app('translator')->getFromJson('app.jp_4'); ?>" value="<?php echo e($edit ? $game->jp_4 : ''); ?>" required>
        </div>
		<?php endif; ?>
		<?php if(!$edit || $game->jp_5 !== ''): ?>
		<div class="form-group">
            <label for="jp_5"><?php echo app('translator')->getFromJson('app.jp_5'); ?></label>
            <input type="text" class="form-control" id="jp_5"
                   name="jp_5" placeholder="<?php echo app('translator')->getFromJson('app.jp_5'); ?>" value="<?php echo e($edit ? $game->jp_5 : ''); ?>" required>
        </div>
		<?php endif; ?>
		<?php if(!$edit || $game->jp_6 !== ''): ?>
		<div class="form-group">
            <label for="jp_6"><?php echo app('translator')->getFromJson('app.jp_6'); ?></label>
            <input type="text" class="form-control" id="jp_6"
                   name="jp_6" placeholder="<?php echo app('translator')->getFromJson('app.jp_6'); ?>" value="<?php echo e($edit ? $game->jp_6 : ''); ?>" required>
        </div>
		<?php endif; ?>
		<?php if(!$edit || $game->jp_7 !== ''): ?>
		<div class="form-group">
            <label for="jp_7"><?php echo app('translator')->getFromJson('app.jp_7'); ?></label>
            <input type="text" class="form-control" id="jp_7"
                   name="jp_7" placeholder="<?php echo app('translator')->getFromJson('app.jp_7'); ?>" value="<?php echo e($edit ? $game->jp_7 : ''); ?>" required>
        </div>
		<?php endif; ?>
		<?php if(!$edit || $game->jp_8 !== ''): ?>
		<div class="form-group">
            <label for="jp_8"><?php echo app('translator')->getFromJson('app.jp_8'); ?></label>
            <input type="text" class="form-control" id="jp_8"
                   name="jp_8" placeholder="<?php echo app('translator')->getFromJson('app.jp_8'); ?>" value="<?php echo e($edit ? $game->jp_8 : ''); ?>" required>
        </div>
		<?php endif; ?>
		<?php if(!$edit || $game->jp_9 !== ''): ?>
		<div class="form-group">
            <label for="jp_9"><?php echo app('translator')->getFromJson('app.jp_9'); ?></label>
            <input type="text" class="form-control" id="jp_9"
                   name="jp_9" placeholder="<?php echo app('translator')->getFromJson('app.jp_9'); ?>" value="<?php echo e($edit ? $game->jp_9 : ''); ?>" required>
        </div>
		<?php endif; ?>
		<?php if(!$edit || $game->jp_10 !== ''): ?>
		<div class="form-group">
            <label for="jp_10"><?php echo app('translator')->getFromJson('app.jp_10'); ?></label>
            <input type="text" class="form-control" id="jp_10"
                   name="jp_10" placeholder="<?php echo app('translator')->getFromJson('app.jp_10'); ?>" value="<?php echo e($edit ? $game->jp_10 : ''); ?>" required>
        </div>
		<?php endif; ?>
    </div>

    <div class="col-md-6">  
		<?php if(!$edit || $game->jp_1_percent !== ''): ?>
		<div class="form-group">
            <label for="jp_1_percent"><?php echo app('translator')->getFromJson('app.jp_1_percent'); ?></label>
            <input type="text" class="form-control" id="jp_1_percent"
                   name="jp_1_percent" placeholder="<?php echo app('translator')->getFromJson('app.jp_1_percent'); ?>" value="<?php echo e($edit ? $game->jp_1_percent : ''); ?>" required>
        </div>
		<?php endif; ?>
		<?php if(!$edit || $game->jp_2_percent !== ''): ?>
		<div class="form-group">
            <label for="jp_2_percent"><?php echo app('translator')->getFromJson('app.jp_2_percent'); ?></label>
            <input type="text" class="form-control" id="jp_2_percent"
                   name="jp_2_percent" placeholder="<?php echo app('translator')->getFromJson('app.jp_2_percent'); ?>" value="<?php echo e($edit ? $game->jp_2_percent : ''); ?>" required>
        </div>
		<?php endif; ?>
		<?php if(!$edit || $game->jp_3_percent !== ''): ?>
		<div class="form-group">
            <label for="jp_3_percent"><?php echo app('translator')->getFromJson('app.jp_3_percent'); ?></label>
            <input type="text" class="form-control" id="jp_3_percent"
                   name="jp_3_percent" placeholder="<?php echo app('translator')->getFromJson('app.jp_3_percent'); ?>" value="<?php echo e($edit ? $game->jp_3_percent : ''); ?>" required>
        </div>
		<?php endif; ?>
		<?php if(!$edit || $game->jp_4_percent !== ''): ?>
		<div class="form-group">
            <label for="jp_4_percent"><?php echo app('translator')->getFromJson('app.jp_4_percent'); ?></label>
            <input type="text" class="form-control" id="jp_4_percent"
                   name="jp_4_percent" placeholder="<?php echo app('translator')->getFromJson('app.jp_4_percent'); ?>" value="<?php echo e($edit ? $game->jp_4_percent : ''); ?>" required>
        </div>
		<?php endif; ?>
		<?php if(!$edit || $game->jp_5_percent !== ''): ?>
		<div class="form-group">
            <label for="jp_5_percent"><?php echo app('translator')->getFromJson('app.jp_5_percent'); ?></label>
            <input type="text" class="form-control" id="jp_5_percent"
                   name="jp_5_percent" placeholder="<?php echo app('translator')->getFromJson('app.jp_5_percent'); ?>" value="<?php echo e($edit ? $game->jp_5_percent : ''); ?>" required>
        </div>
		<?php endif; ?>
		<?php if(!$edit || $game->jp_6_percent !== ''): ?>
		<div class="form-group">
            <label for="jp_6_percent"><?php echo app('translator')->getFromJson('app.jp_6_percent'); ?></label>
            <input type="text" class="form-control" id="jp_6_percent"
                   name="jp_6_percent" placeholder="<?php echo app('translator')->getFromJson('app.jp_6_percent'); ?>" value="<?php echo e($edit ? $game->jp_6_percent : ''); ?>" required>
        </div>
		<?php endif; ?>
		<?php if(!$edit || $game->jp_7_percent !== ''): ?>
		<div class="form-group">
            <label for="jp_7_percent"><?php echo app('translator')->getFromJson('app.jp_7_percent'); ?></label>
            <input type="text" class="form-control" id="jp_7_percent"
                   name="jp_7_percent" placeholder="<?php echo app('translator')->getFromJson('app.jp_7_percent'); ?>" value="<?php echo e($edit ? $game->jp_7_percent : ''); ?>" required>
        </div>
		<?php endif; ?>
		<?php if(!$edit || $game->jp_8_percent !== ''): ?>
		<div class="form-group">
            <label for="jp_8_percent"><?php echo app('translator')->getFromJson('app.jp_8_percent'); ?></label>
            <input type="text" class="form-control" id="jp_8_percent"
                   name="jp_8_percent" placeholder="<?php echo app('translator')->getFromJson('app.jp_8_percent'); ?>" value="<?php echo e($edit ? $game->jp_8_percent : ''); ?>" required>
        </div>
		<?php endif; ?>
		<?php if(!$edit || $game->jp_9_percent !== ''): ?>
		<div class="form-group">
            <label for="jp_9_percent"><?php echo app('translator')->getFromJson('app.jp_9_percent'); ?></label>
            <input type="text" class="form-control" id="jp_9_percent"
                   name="jp_9_percent" placeholder="<?php echo app('translator')->getFromJson('app.jp_9_percent'); ?>" value="<?php echo e($edit ? $game->jp_9_percent : ''); ?>" required>
        </div>
		<?php endif; ?>
		<?php if(!$edit || $game->jp_10_percent !== ''): ?>
		<div class="form-group">
            <label for="jp_10_percent"><?php echo app('translator')->getFromJson('app.jp_10_percent'); ?></label>
            <input type="text" class="form-control" id="jp_10_percent"
                   name="jp_10_percent" placeholder="<?php echo app('translator')->getFromJson('app.jp_10_percent'); ?>" value="<?php echo e($edit ? $game->jp_10_percent : ''); ?>" required>
        </div>
		<?php endif; ?>
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

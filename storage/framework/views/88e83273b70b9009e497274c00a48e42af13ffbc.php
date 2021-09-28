		<div class="form-group">
            <label for="min_pay"><?php echo app('translator')->getFromJson('app.min_pay'); ?></label>
            <input type="text" class="form-control" id="min_pay"
                   name="min_pay" placeholder="<?php echo app('translator')->getFromJson('app.min_pay'); ?>" required value="<?php echo e($edit ? $return->min_pay : ''); ?>">
        </div>
		<div class="form-group">
            <label for="max_pay"><?php echo app('translator')->getFromJson('app.max_pay'); ?></label>
            <input type="text" class="form-control" id="max_pay"
                   name="max_pay" placeholder="<?php echo app('translator')->getFromJson('app.max_pay'); ?>" required value="<?php echo e($edit ? $return->max_pay : ''); ?>">
        </div>
		<div class="form-group">
            <label for="percent"><?php echo app('translator')->getFromJson('app.percent'); ?></label>
            <input type="text" class="form-control" id="percent"
                   name="percent" placeholder="<?php echo app('translator')->getFromJson('app.percent'); ?>" required value="<?php echo e($edit ? $return->percent : ''); ?>">
        </div>
		
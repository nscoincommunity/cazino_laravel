 <div class="row">
    <div class="col-md-12">
		
		<div class="form-group">
            <label for="name"><?php echo app('translator')->getFromJson('app.name'); ?></label>
            <input type="text" class="form-control" id="name"
                   name="name" placeholder="<?php echo app('translator')->getFromJson('app.name'); ?>" required value="<?php echo e($edit ? $jackpot->name : ''); ?>">
        </div>
		<div class="form-group">
            <label for="balance"><?php echo app('translator')->getFromJson('app.balance'); ?></label>
            <input type="text" class="form-control" id="balance"
                   name="balance" placeholder="0.00" disabled value="<?php echo e($edit ? $jackpot->balance : ''); ?>">
        </div>
		<div class="form-group">
            <label for="start_balance"><?php echo app('translator')->getFromJson('app.start_balance_jackpot'); ?></label>
            <input type="text" class="form-control" id="start_balance"
                   name="start_balance" placeholder="0.00" value="<?php echo e($edit ? $jackpot->start_balance : ''); ?>">
        </div>
		
		<div class="form-group">
            <label for="pay_sum"><?php echo app('translator')->getFromJson('app.pay_sum'); ?></label>
            <input type="text" class="form-control" id="pay_sum"
                   name="pay_sum" placeholder="<?php echo app('translator')->getFromJson('app.pay_sum'); ?>" required value="<?php echo e($edit ? $jackpot->pay_sum : ''); ?>">
        </div>
		<div class="form-group">
            <label for="percent"><?php echo app('translator')->getFromJson('app.percent'); ?></label>
            <input type="text" class="form-control" id="percent"
                   name="percent" placeholder="<?php echo app('translator')->getFromJson('app.percent'); ?>" required value="<?php echo e($edit ? $jackpot->percent : ''); ?>">
        </div>
		
    </div>

</div>

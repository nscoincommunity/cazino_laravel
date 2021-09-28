 

<?php $__env->startSection('page-title', trans('app.balance')); ?>
<?php $__env->startSection('page-heading', trans('app.balance')); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item active">
        <?php echo app('translator')->getFromJson('app.balance'); ?>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('frontend.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<div class="card">
    <div class="card-body">
	
		<h1><?php echo app('translator')->getFromJson('app.balance'); ?></h1>
	
		<form action="<?= route('frontend.profile.balance.post') ?>" method="POST">
			<table>
				<tbody>
				<tr>		
					<td>
						<select class="form-control" name="type">
							<option value="piastrix"><?php echo app('translator')->getFromJson('app.piastrix'); ?></option>
							<option value="coinpayment"><?php echo app('translator')->getFromJson('app.coinpayment'); ?></option>
						</select>
					</td>
					<td>
						<input class="form-control text" type="text" placeholder="<?php echo app('translator')->getFromJson('app.sum'); ?>" id="addsumm" name="summ" value="5">						
						<input type="hidden" name="_token" value="<?= csrf_token() ?>">
					</td>				
					<td>
						<button class="btn btn-large btn-info" type="submit" id="checksumm"><?php echo app('translator')->getFromJson('app.add'); ?></button>
					</td>
				</tr>
				</tbody>
			</table>
		</form>
		
		<hr>

        <div class="table-responsive" id="users-table-wrapper">
            <table class="table table-borderless table-striped">
                <thead>
                <tr>
                    <th class="min-width-100"><?php echo app('translator')->getFromJson('app.date'); ?></th>
					<th class="min-width-100"><?php echo app('translator')->getFromJson('app.sum'); ?></th>
					<th class="min-width-100"><?php echo app('translator')->getFromJson('app.payment_system'); ?></th>
					<th class="min-width-100"><?php echo app('translator')->getFromJson('app.status'); ?></th>
                </tr>
                </thead>
                <tbody>
                    <?php if(count($history)): ?>
                        <?php $__currentLoopData = $history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <?php echo $__env->make('frontend.user.partials.balance_row', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6"><em><?php echo app('translator')->getFromJson('app.no_records_found'); ?></em></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
			<div style="margin: 0 auto;">
				<?php echo e($history->links()); ?>

			</div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
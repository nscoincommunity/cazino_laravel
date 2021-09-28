 

<?php $__env->startSection('page-title', trans('app.statistics')); ?>
<?php $__env->startSection('page-heading', trans('app.statistics')); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item active">
        <?php echo app('translator')->getFromJson('app.statistics'); ?>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('backend.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<style>
.box {
    padding: 5px 25px;
}
</style>

<div class="card">
    <div class="card-body">
	
		<form action="" method="GET">
            <div class="row">
				<label class="col-md-2 box">System</label>
                <div class="col-md-10 box">
                    <input type="text" class="form-control" name="system" value="<?php echo e(Input::get('system')); ?>">                   
                </div>
            </div>
			<div class="row">
				<label class="col-md-2 box">Type</label>
                <div class="col-md-10 box">
					<select name="type" class="form-control">
						<option value="" <?php if(Input::get('type') == ''): ?> selected <?php endif; ?>>All</option>
						<option value="add" <?php if(Input::get('type') == 'add'): ?> selected <?php endif; ?>>Add</option>
						<option value="out" <?php if(Input::get('type') == 'out'): ?> selected <?php endif; ?>>Out</option>
					</select>                  
                </div>
            </div>
			<div class="row">
				<label class="col-md-2 box">Payeer</label>
                <div class="col-md-10 box">
                    <input type="text" class="form-control" name="payeer" value="<?php echo e(Input::get('payeer')); ?>">                   
                </div>
            </div>
			<div class="row">
				<label class="col-md-2 box">User</label>
                <div class="col-md-10 box">
                    <input type="text" class="form-control" name="user" value="<?php echo e(Input::get('user')); ?>">                   
                </div>
            </div>
			<div class="row">
				<label class="col-md-2 box">Sum</label>
                <div class="col-md-5 box">
                    <input type="text" class="form-control" name="sum_from" value="<?php echo e(Input::get('sum_from')); ?>">                   
                </div>
				<div class="col-md-5 box">
                    <input type="text" class="form-control" name="sum_to" value="<?php echo e(Input::get('sum_to')); ?>">                   
                </div>
            </div>
			<div class="row">
				<label class="col-md-2 box">DateTime</label>
                <div class="col-md-10 box">
                    <input type="text" class="form-control" name="dates" value="<?php echo e(Input::get('dates')); ?>">                     
                </div>
            </div>
			<div class="row">
				<label class="col-md-2 box"></label>
                <div class="col-md-10 box">
                    <button type="submit" class="btn btn-primary">Filter</button>            
                </div>
            </div>
        </form>
		
		<hr>

        <div class="table-responsive" id="users-table-wrapper">
            <table class="table table-borderless table-striped">
                <thead>
                <tr>
                    <th class="min-width-100">Ico</th>
                    <th class="min-width-100"><?php echo app('translator')->getFromJson('app.system'); ?></th>
					<th class="min-width-100"><?php echo app('translator')->getFromJson('app.type'); ?> <?php echo app('translator')->getFromJson('app.sum'); ?></th>
					<th class="min-width-100"><?php echo app('translator')->getFromJson('app.user'); ?></th>
					<th class="min-width-100"><?php echo app('translator')->getFromJson('app.date'); ?></th>
                </tr>
                </thead>
                <tbody>
                    <?php if(count($statistics)): ?>
                        <?php $__currentLoopData = $statistics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <?php echo $__env->make('backend.user.partials.stat_row', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6"><em><?php echo app('translator')->getFromJson('app.no_records_found'); ?></em></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
			<div style="margin: 0 auto;">
				<?php echo e($statistics->appends(Request::except('page'))->links()); ?>

			</div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
		$(function() {
			$('input[name="dates"]').daterangepicker({
				timePicker: true,
				timePicker24Hour: true,
				startDate: moment().subtract(30, 'day'),
				endDate: moment().add(7, 'day'),				
				
				locale: {
					format: 'YYYY-MM-DD HH:mm'
				}
			});
		});		
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
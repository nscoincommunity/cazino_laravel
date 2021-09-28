<?php $__env->startSection('page-title', trans('app.edit_jackpot')); ?>
<?php $__env->startSection('page-heading', $jackpot->title); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item">
        <a href="<?php echo e(route('backend.jackpot.list')); ?>"><?php echo app('translator')->getFromJson('app.jackpots'); ?></a>
    </li>
    <li class="breadcrumb-item">
        <?php echo e($jackpot->name); ?>

    </li>
    <li class="breadcrumb-item active">
        <?php echo app('translator')->getFromJson('app.edit'); ?>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('backend.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo Form::open(['route' => array('backend.jackpot.update', $jackpot->id), 'files' => true, 'id' => 'user-form']); ?>

<div class="row">
    <div class="col-lg-6 col-xl-7">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                        <?php echo app('translator')->getFromJson('app.jackpot_details'); ?>
                </h5>
                <?php echo $__env->make('backend.jackpots.partials.base', ['edit' => true], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
		</div>
    </div>
	
    <div class="col-lg-6 col-xl-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                        Jackpot Stat
                </h5>
				
					<table class="table table-borderless table-striped">
						<thead>
						<tr>
							<th class="min-width-100">User</th>					
							<th class="min-width-100">Type</th>
							<th class="min-width-100">Sum</th>					
							<th class="min-width-100">Date</th>
						</tr>
						</thead>
						<tbody>
								<?php if(count($jackpot_stat)): ?>
									<?php $__currentLoopData = $jackpot_stat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php echo $__env->make('backend.jackpots.partials.row_stat', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php else: ?>
									<tr>
										<td colspan="4"><em><?php echo app('translator')->getFromJson('app.no_records_found'); ?></em></td>
									</tr>
								<?php endif; ?>
						</tbody>
					</table>
				
            </div>
		</div>
    </div>
</div>	
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">
                <?php echo app('translator')->getFromJson('app.edit_jackpot'); ?>
            </button>
        </div>
    </div>
<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
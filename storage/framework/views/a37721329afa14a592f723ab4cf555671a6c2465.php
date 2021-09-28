<?php $__env->startSection('page-title', trans('app.jackpots')); ?>
<?php $__env->startSection('page-heading', trans('app.jackpots')); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item active">
        <?php echo app('translator')->getFromJson('app.jackpots'); ?>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('backend.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="card">
    <div class="card-body">
	
		<form action="" method="GET" id="users-form" class="pb-2 mb-3 border-bottom-light">
            <div class="row my-3 flex-md-row flex-column-reverse">
                <div class="col-md-4 mt-md-0 mt-2"></div>
                <div class="col-md-2 mt-2 mt-md-0"></div>
                <div class="col-md-6">
					<a href="<?php echo e(route('backend.jackpot.create')); ?>" class="btn btn-primary btn-rounded float-right">
                        <i class="fas fa-plus mr-2"></i>
                        <?php echo app('translator')->getFromJson('app.add_jackpot'); ?>
                    </a>
                </div>
            </div>
        </form>
	
        <div class="table-responsive" id="users-table-wrapper">
            <table class="table table-borderless table-striped">
                <thead>
                <tr>
                    <th class="min-width-100">Title</th>
                    <th class="min-width-100">Balance</th>
					<th class="min-width-100"><?php echo app('translator')->getFromJson('app.pay_in'); ?></th>
					<th class="min-width-100"><?php echo app('translator')->getFromJson('app.pay_out'); ?></th> 
					<th class="min-width-100">Pay Sum</th>						                   
					<th class="min-width-100">Percent</th>					
                    <th class="text-center min-width-100"><?php echo app('translator')->getFromJson('app.action'); ?></th>
                </tr>
                </thead>
                <tbody>
                    <?php if(count($jackpots)): ?>
                        <?php $__currentLoopData = $jackpots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jackpot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make('backend.jackpots.partials.row', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8"><em><?php echo app('translator')->getFromJson('app.no_records_found'); ?></em></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
			
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="openAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
			<form action="<?php echo e(route('backend.jackpot.balance')); ?>" method="POST">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle"><?php echo app('translator')->getFromJson('app.balance'); ?> <?php echo app('translator')->getFromJson('app.pay_in'); ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="AddSum"><?php echo app('translator')->getFromJson('app.sum'); ?></label>
						<input type="number" class="form-control" id="AddSum" name="summ" placeholder="<?php echo app('translator')->getFromJson('app.sum'); ?>" required>
						<input type="hidden" name="type" value="add">
						<input type="hidden" id="AddId" name="jackpot_id">
						<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo app('translator')->getFromJson('app.close'); ?></button>
					<button type="submit" class="btn btn-primary"><?php echo app('translator')->getFromJson('app.pay_in'); ?></button>
				</div>
			</form>
        </div>
    </div>
</div>

<div class="modal fade" id="openOutModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
			<form action="<?php echo e(route('backend.jackpot.balance')); ?>" method="POST">
				<div class="modal-header">
					<h5 class="modal-title"><?php echo app('translator')->getFromJson('app.balance'); ?> <?php echo app('translator')->getFromJson('app.pay_out'); ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="OutSum"><?php echo app('translator')->getFromJson('app.sum'); ?></label>
						<input type="number" class="form-control" id="OutSum" name="summ" placeholder="<?php echo app('translator')->getFromJson('app.sum'); ?>" required>
						<input type="hidden" name="type" value="out">
						<input type="hidden" id="OutId" name="jackpot_id">
						<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo app('translator')->getFromJson('app.close'); ?></button>
					<button type="submit" class="btn btn-primary"><?php echo app('translator')->getFromJson('app.pay_out'); ?></button>
				</div>
			</form>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	<script>
        $("#status").change(function () {
            $("#users-form").submit();
        });
		$('.addPayment').click(function(event){	
			console.log($(event.target));
			var item = $(event.target).hasClass('addPayment') ? $(event.target) : $(event.target).parent();
			var id = item.attr('data-id');
			$('#AddId').val(id);			
		});
		
		$('.outPayment').click(function(event){		
			console.log($(event.target));
			var item = $(event.target).hasClass('outPayment') ? $(event.target) : $(event.target).parent();
			var id = item.attr('data-id');
			$('#OutId').val(id);			
		});
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
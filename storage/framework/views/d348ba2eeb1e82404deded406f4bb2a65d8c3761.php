<?php $__env->startSection('page-title', trans('app.points')); ?>
<?php $__env->startSection('page-heading', trans('app.points')); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item active">
        <?php echo app('translator')->getFromJson('app.points'); ?>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('backend.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="card">
    <div class="card-body">
	
		<form action="" method="GET" id="points-form" class="pb-2 mb-3 border-bottom-light">
            <div class="row my-3 flex-md-row flex-column-reverse">
                <div class="col-md-4 mt-md-0 mt-2"></div>
                <div class="col-md-2 mt-2 mt-md-0"></div>
                <div class="col-md-6">
					<a href="<?php echo e(route('backend.points.create')); ?>" class="btn btn-primary btn-rounded float-right">
                        <i class="fas fa-plus mr-2"></i>
                        <?php echo app('translator')->getFromJson('app.add_point'); ?>
                    </a>
                </div>
            </div>
        </form>
	
        <div class="table-responsive" id="points-table-wrapper">
            <table class="table table-borderless table-striped">
                <thead>
                <tr>
                    <th class="min-width-100"><?php echo app('translator')->getFromJson('app.rating'); ?></th>
                    <th class="min-width-100"><?php echo app('translator')->getFromJson('app.name'); ?></th>
                    <th class="min-width-100"><?php echo app('translator')->getFromJson('app.sum'); ?></th>	
					<th class="min-width-100"><?php echo app('translator')->getFromJson('app.bonus'); ?></th>	
					<th class="min-width-100"><?php echo app('translator')->getFromJson('app.exchange'); ?></th>						
                    <th class="text-center min-width-100"><?php echo app('translator')->getFromJson('app.action'); ?></th>
                </tr>
                </thead>
                <tbody>
                    <?php if(count($points)): ?>
                        <?php $__currentLoopData = $points; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $point): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make('backend.points.partials.row', ['base' => true], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $("#view").change(function () {
            $("#points-form").submit();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
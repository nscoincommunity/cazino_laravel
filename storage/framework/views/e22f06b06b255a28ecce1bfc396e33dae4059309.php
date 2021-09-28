<?php $__env->startSection('page-title', trans('app.game_stat')); ?>
<?php $__env->startSection('page-heading', trans('app.game_stat')); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item active">
        <?php echo app('translator')->getFromJson('app.game_stat'); ?>
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
				<label class="col-md-2 box">Game</label>
                <div class="col-md-10 box">
                    <input type="text" class="form-control" name="game" value="<?php echo e(Input::get('game')); ?>">                   
                </div>
            </div>
			<div class="row">
				<label class="col-md-2 box">User</label>
                <div class="col-md-10 box">
                    <input type="text" class="form-control" name="user" value="<?php echo e(Input::get('user')); ?>">                   
                </div>
            </div>
			<div class="row">
				<label class="col-md-2 box">Balance</label>
                <div class="col-md-5 box">
                    <input type="text" class="form-control" name="balance_from" value="<?php echo e(Input::get('balance_from')); ?>">                   
                </div>
				<div class="col-md-5 box">
                    <input type="text" class="form-control" name="balance_to" value="<?php echo e(Input::get('balance_to')); ?>">                   
                </div>
            </div>
			<div class="row">
				<label class="col-md-2 box">Bet</label>
                <div class="col-md-5 box">
                    <input type="text" class="form-control" name="bet_from" value="<?php echo e(Input::get('bet_from')); ?>">                   
                </div>
				<div class="col-md-5 box">
                    <input type="text" class="form-control" name="bet_to" value="<?php echo e(Input::get('bet_to')); ?>">                   
                </div>
            </div>
			<div class="row">
				<label class="col-md-2 box">win</label>
                <div class="col-md-5 box">
                    <input type="text" class="form-control" name="win_from" value="<?php echo e(Input::get('win_from')); ?>">                   
                </div>
				<div class="col-md-5 box">
                    <input type="text" class="form-control" name="win_to" value="<?php echo e(Input::get('win_to')); ?>">                   
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
                    <th class="min-width-100">Game</th>
                    <th class="min-width-100">User</th>					
					<th class="min-width-100">Balance</th>
					<th class="min-width-100">Bet</th>
					<th class="min-width-100">Win</th>					
                    <th class="min-width-100">Date</th>
                </tr>
                </thead>
                <tbody>
                    <?php if(count($game_stat)): ?>
                        <?php $__currentLoopData = $game_stat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make('backend.games.partials.row_stat', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7"><em><?php echo app('translator')->getFromJson('app.no_records_found'); ?></em></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
			
			<div style="margin: 0 auto;">
				<?php echo e($game_stat->appends(Request::except('page'))->links()); ?>

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
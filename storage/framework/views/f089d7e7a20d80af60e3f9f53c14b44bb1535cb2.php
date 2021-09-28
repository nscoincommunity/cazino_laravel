<?php $__env->startSection('page-title', trans('app.games')); ?>
<?php $__env->startSection('page-heading', trans('app.games')); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item active">
        <?php echo app('translator')->getFromJson('app.games'); ?>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('backend.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="card">
    <div class="card-body">
	
		<form action="" method="GET" id="games-form" class="pb-2 mb-3 border-bottom-light">
            <div class="row my-3 flex-md-row flex-column-reverse">
                <div class="col-md-4 mt-md-0 mt-2">
                    <div class="input-group custom-search-form">
                        <input type="text"
                               class="form-control input-solid"
                               name="search"
                               value="<?php echo e(Input::get('search')); ?>"
                               placeholder="<?php echo app('translator')->getFromJson('app.search_for_users'); ?>">

                            <span class="input-group-append">
                                <?php if(Input::has('search') && Input::get('search') != ''): ?>
                                    <a href="<?php echo e(route('backend.game.list')); ?>"
                                           class="btn btn-light d-flex align-items-center text-muted"
                                           role="button">
                                        <i class="fas fa-times"></i>
                                    </a>
                                <?php endif; ?>
                                <button class="btn btn-light" type="submit" id="search-games-btn">
                                    <i class="fas fa-search text-muted"></i>
                                </button>
                            </span>
                    </div>
                </div>

                <div class="col-md-2 mt-2 mt-md-0">
                    <?php echo Form::select('view', $views, Input::get('view'), ['id' => 'view', 'class' => 'form-control input-solid']); ?>

                </div>
				
				<div class="col-md-2 mt-2 mt-md-0">
                    <?php echo Form::select('device', $devices, Input::get('device'), ['id' => 'device', 'class' => 'form-control input-solid']); ?>

                </div>
				
				<div class="col-md-2 mt-2 mt-md-0">
					<select class="form-control input-solid" name="category" id="category">
						<option value="">All</option>
						<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($category->id); ?>" <?php echo e($category->id == Input::get('category') ? 'selected':''); ?>><?php echo e($category->title); ?></option>
							<?php $__currentLoopData = $category->inner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($inner->id); ?>" <?php echo e($inner->id == Input::get('category') ? 'selected':''); ?>>&nbsp;&nbsp;&nbsp;<?php echo e($inner->title); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
                </div>

                <div class="col-md-2">
					<a href="<?php echo e(route('backend.game.create')); ?>" class="btn btn-primary btn-rounded float-right">
                        <i class="fas fa-plus mr-2"></i>
                        <?php echo app('translator')->getFromJson('app.add_game'); ?>
                    </a>
                </div>
            </div>
        </form>
		
		<form action="<?php echo e(route('backend.game.categories')); ?>" method="POST" class="pb-2 mb-3 border-bottom-light">
			<div class="table-responsive" id="games-table-wrapper">
				<table class="table table-borderless table-striped">
					<thead>
					<tr>
						<th class="min-width-100">Ico</th>
						<th class="min-width-100">Game</th>
						<th class="min-width-100">Bank</th>					
						<th class="min-width-100">Percent</th>
						<th class="min-width-100">Count Spin</th>
						<th class="min-width-100">Count Bonus</th>					
						<th class="min-width-100">Win Line</th>
						<th class="min-width-100">Win Bonus</th>
						<th class="text-center min-width-100"><?php echo app('translator')->getFromJson('app.action'); ?></th>
						<td class="text-center min-width-50">
							<div class="custom-control custom-checkbox">
								<input class="custom-control-input checkAll" id="cb-0" type="checkbox">
								<label class="custom-control-label d-inline" for="cb-0">&nbsp;</label>
							</div>
						</td>
					</tr>
					</thead>
					<tbody>
						<?php if(count($games)): ?>
							<?php $__currentLoopData = $games; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $game): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php echo $__env->make('backend.games.partials.row', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php else: ?>
							<tr>
								<td colspan="10"><em><?php echo app('translator')->getFromJson('app.no_records_found'); ?></em></td>
							</tr>
						<?php endif; ?>
					</tbody>
				</table>
								
			</div>
			
			<div class="row">
				<div class="col-md-2">
					<select name="action" class="form-control">
						<option value="add_category">Добавить в категории</option>
						<option value="change_category">Изменить категории</option>
					</select>
				</div>
				<div class="col-md-2">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Set Categories</button>
				</div>
			</div>
			
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title"><?php echo app('translator')->getFromJson('app.categories'); ?></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<select class="form-control input-solid" name="category[]" id="category" multiple>
								<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($category->id); ?>" ><?php echo e($category->title); ?></option>
									<?php $__currentLoopData = $category->inner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($inner->id); ?>">&nbsp;&nbsp;&nbsp;<?php echo e($inner->title); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
						<div class="modal-footer">
							<input type="hidden" value="<?= csrf_token() ?>" name="_token">
							<button type="submit" class="btn btn-primary">Save Changes</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		</form>
    </div>
</div>
				
    
<br />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $("#view").change(function () {
            $("#games-form").submit();
        });		
		$("#device").change(function () {
            $("#games-form").submit();
        });
		$("#category").change(function () {
            $("#games-form").submit();
        });
		$('.checkAll').change(function(event){
			if( $(event.target).is(':checked') ){
				$('input[type=checkbox]').attr('checked', true);
			}else{
				$('input[type=checkbox]').attr('checked', false);
			}
		});
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
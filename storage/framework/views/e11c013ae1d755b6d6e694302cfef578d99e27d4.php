 <div class="row">
    
    <div class="col-md-12">        
        
		<div class="form-group">
            <label for="view">Category</label><br>
			<select class="form-control" name="category[]" multiple="multiple">
				<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($category->id); ?>" <?php echo e(($edit && in_array($category->id, $cats)) ? 'selected':''); ?>><?php echo e($category->title); ?></option>
					<?php $__currentLoopData = $category->inner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option value="<?php echo e($inner->id); ?>" style="padding-left: 25px;" <?php echo e(( $edit && in_array($inner->id, $cats)) ? 'selected':''); ?>><?php echo e($inner->title); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</select>
			<!--
			<?php echo Form::select('category[]', $categories, $edit ? $cats : '', ['multiple'=>'multiple', 'id' => 'category', 'class' => ' form-control']); ?>

			-->
        </div>
		
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

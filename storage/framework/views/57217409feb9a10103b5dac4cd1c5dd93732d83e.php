		<div class="form-group">
            <label for="title"><?php echo app('translator')->getFromJson('app.title'); ?></label>
            <input type="text" class="form-control" id="title"
                   name="title" placeholder="<?php echo app('translator')->getFromJson('app.title'); ?>" required value="<?php echo e($edit ? $category->title : ''); ?>">
        </div>
		<div class="form-group">
            <label for="position"><?php echo app('translator')->getFromJson('app.position'); ?></label>
            <input type="number" class="form-control" id="position"
                   name="position" placeholder="<?php echo app('translator')->getFromJson('app.position'); ?>" required value="<?php echo e($edit ? $category->position : ''); ?>">
        </div>
		<div class="form-group">
            <label for="href"><?php echo app('translator')->getFromJson('app.parent'); ?></label>
           <?php echo Form::select('parent', $categories, $edit?$category->parent:0, ['id' => 'parent', 'class' => 'form-control input-solid']); ?>

        </div>
		<div class="form-group">
            <label for="href"><?php echo app('translator')->getFromJson('app.href'); ?></label>
            <input type="text" class="form-control" id="href"
                   name="href" placeholder="<?php echo app('translator')->getFromJson('app.href'); ?>" required value="<?php echo e($edit ? $category->href : ''); ?>">
        </div>
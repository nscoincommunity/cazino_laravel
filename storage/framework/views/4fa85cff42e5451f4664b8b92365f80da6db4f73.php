		
		<div class="form-group">
            <label for="title"><?php echo app('translator')->getFromJson('app.title'); ?></label>
            <input type="text" class="form-control" id="title"
                   name="title" placeholder="<?php echo app('translator')->getFromJson('app.title'); ?>" required value="<?php echo e($edit ? $page->title : ''); ?>">
        </div>
		<div class="form-group">
            <label for="sub_title"><?php echo app('translator')->getFromJson('app.sub_title'); ?></label>
            <input type="text" class="form-control" id="sub_title"
                   name="sub_title" placeholder="<?php echo app('translator')->getFromJson('app.sub_title'); ?>" required value="<?php echo e($edit ? $page->sub_title : ''); ?>">
        </div>
		<div class="form-group">
            <label for="keywords"><?php echo app('translator')->getFromJson('app.keywords'); ?></label>
            <input type="text" class="form-control" id="keywords"
                   name="keywords" placeholder="<?php echo app('translator')->getFromJson('app.keywords'); ?>" required value="<?php echo e($edit ? $page->keywords : ''); ?>">
        </div>
		<div class="form-group">
            <label for="description"><?php echo app('translator')->getFromJson('app.description'); ?></label>
            <input type="text" class="form-control" id="description"
                   name="description" placeholder="<?php echo app('translator')->getFromJson('app.description'); ?>" required value="<?php echo e($edit ? $page->description : ''); ?>">
        </div>
		
		<div class="form-group">
            <label for="path"><?php echo app('translator')->getFromJson('app.href'); ?></label>
            <input type="text" class="form-control" id="path"
                   name="path" placeholder="<?php echo app('translator')->getFromJson('app.href'); ?>" required value="<?php echo e($edit ? $page->path : ''); ?>">
        </div>
		
		<div class="form-group">
            <label for="body"><?php echo app('translator')->getFromJson('app.text'); ?></label>
			<textarea name="body" placeholder="<?php echo app('translator')->getFromJson('app.text'); ?>" required id="body"><?php echo e($edit ? $page->body : ''); ?></textarea>
        </div>
		<div class="form-group">
            <label for="body"><?php echo app('translator')->getFromJson('app.type'); ?></label>
			<select name="type" id="type" class="form-control">
				<option value="0" <?php echo e(($edit && $page->type == 0) ? 'selected' : ''); ?>>System Page</option>
				<option value="1" <?php echo e(($edit && $page->type == 1) ? 'selected' : ''); ?>>Page 1</option>
				<option value="2" <?php echo e(($edit && $page->type == 2) ? 'selected' : ''); ?>>Page 2</option>
			</select>
        </div>
		
		<div class="form-group">
			<label for="view"><?php echo app('translator')->getFromJson('app.view'); ?></label>
			<select name="view" id="view" class="form-control">
				<option value="0" <?php echo e(($edit && $page->view == 0) ? 'selected' : ''); ?>>Disabled</option>
				<option value="1" <?php echo e(($edit && $page->view == 1) ? 'selected' : ''); ?>>Active</option>
			</select>
        </div>
		
		<script>
            CKEDITOR.replace( 'body' );
        </script>
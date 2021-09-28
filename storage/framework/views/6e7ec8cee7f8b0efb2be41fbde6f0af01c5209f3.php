		<div class="form-group">
            <label for="rating"><?php echo app('translator')->getFromJson('app.rating'); ?></label>
            <input type="text" class="form-control" id="rating"
                   name="rating" placeholder="<?php echo app('translator')->getFromJson('app.rating'); ?>" required value="<?php echo e($edit ? $point->rating : ''); ?>">
        </div>
		<div class="form-group">
            <label for="name"><?php echo app('translator')->getFromJson('app.name'); ?></label>
            <input type="text" class="form-control" id="name"
                   name="name" placeholder="<?php echo app('translator')->getFromJson('app.name'); ?>" required value="<?php echo e($edit ? $point->name : ''); ?>">
        </div>
		<div class="form-group">
            <label for="sum"><?php echo app('translator')->getFromJson('app.sum'); ?></label>
            <input type="text" class="form-control" id="sum"
                   name="sum" placeholder="<?php echo app('translator')->getFromJson('app.sum'); ?>" required value="<?php echo e($edit ? $point->sum : ''); ?>">
        </div>
		<div class="form-group">
            <label for="bonus"><?php echo app('translator')->getFromJson('app.bonus'); ?></label>
            <input type="text" class="form-control" id="bonus"
                   name="bonus" placeholder="<?php echo app('translator')->getFromJson('app.bonus'); ?>" required value="<?php echo e($edit ? $point->bonus : ''); ?>">
        </div>
		<div class="form-group">
            <label for="img"><?php echo app('translator')->getFromJson('app.img'); ?></label>
            <input type="text" class="form-control" id="img"
                   name="img" placeholder="<?php echo app('translator')->getFromJson('app.img'); ?>" required value="<?php echo e($edit ? $point->img : ''); ?>">
        </div>
		<div class="form-group">
            <label for="pay"><?php echo app('translator')->getFromJson('app.pay'); ?></label>
            <input type="text" class="form-control" id="pay"
                   name="pay" placeholder="<?php echo app('translator')->getFromJson('app.pay'); ?>" required value="<?php echo e($edit ? $point->pay : ''); ?>">
        </div>
		<div class="form-group">
            <label for="exchange"><?php echo app('translator')->getFromJson('app.exchange'); ?></label>
            <input type="text" class="form-control" id="exchange"
                   name="exchange" placeholder="<?php echo app('translator')->getFromJson('app.exchange'); ?>" required value="<?php echo e($edit ? $point->exchange : ''); ?>">
        </div>
		<div class="form-group">
            <label for="title"><?php echo app('translator')->getFromJson('app.title'); ?></label>
            <input type="text" class="form-control" id="title"
                   name="title" placeholder="<?php echo app('translator')->getFromJson('app.title'); ?>" required value="<?php echo e($edit ? $point->title : ''); ?>">
        </div>
		<div class="form-group">
            <label for="description"><?php echo app('translator')->getFromJson('app.description'); ?></label>
			<textarea id="description" name="description"><?php echo e($edit ? $point->description : ''); ?></textarea>
        </div>
		
		<script>
            CKEDITOR.replace( 'description' );
        </script>
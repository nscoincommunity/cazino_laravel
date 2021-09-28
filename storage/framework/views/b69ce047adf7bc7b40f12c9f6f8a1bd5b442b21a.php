<?php $__env->startSection('page-title', trans('app.roles')); ?>
<?php $__env->startSection('page-heading', $edit ? $role->name : trans('app.create_new_role')); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item">
        <a href="<?php echo e(route('backend.role.index')); ?>"><?php echo app('translator')->getFromJson('app.roles'); ?></a>
    </li>
    <li class="breadcrumb-item active">
        <?php echo e($edit ? trans('app.edit') : trans('app.create')); ?>

    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('backend.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php if($edit): ?>
    <?php echo Form::open(['route' => ['backend.role.update', $role->id], 'method' => 'PUT', 'id' => 'role-form']); ?>

<?php else: ?>
    <?php echo Form::open(['route' => 'backend.role.store', 'id' => 'role-form']); ?>

<?php endif; ?>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <h5 class="card-title">
                    <?php echo app('translator')->getFromJson('app.role_details_big'); ?>
                </h5>
                <p class="text-muted font-weight-light">
                    A general role information.
                </p>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label for="slug"><?php echo app('translator')->getFromJson('app.slug'); ?></label>
                    <input type="text" class="form-control" id="slug"
                           name="slug" placeholder="<?php echo app('translator')->getFromJson('app.role_name'); ?>" value="<?php echo e($edit ? $role->slug : old('slug')); ?>">
                </div>
                <div class="form-group">
                    <label for="name"><?php echo app('translator')->getFromJson('app.name'); ?></label>
                    <input type="text" class="form-control" id="name"
                           name="name" placeholder="<?php echo app('translator')->getFromJson('app.name'); ?>" value="<?php echo e($edit ? $role->name : old('name')); ?>">
                </div>
				<div class="form-group">
                    <label for="level"><?php echo app('translator')->getFromJson('app.level'); ?></label>
                    <input type="text" class="form-control" id="level"
                           name="level" placeholder="<?php echo app('translator')->getFromJson('app.level'); ?>" value="<?php echo e($edit ? $role->level : old('level')); ?>">
                </div>
                <div class="form-group">
                    <label for="description"><?php echo app('translator')->getFromJson('app.description'); ?></label>
                    <textarea name="description" id="description" class="form-control"><?php echo e($edit ? $role->description : old('description')); ?></textarea>
                </div>
            </div>
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary">
    <?php echo e($edit ? trans('app.update_role') : trans('app.create_role')); ?>

</button>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
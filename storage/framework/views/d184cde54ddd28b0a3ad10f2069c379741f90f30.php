<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="first_name"><?php echo app('translator')->getFromJson('app.role'); ?></label>
            <?php echo Form::select('role_id', $roles, $edit ? $user->role_id : '',
                ['class' => 'form-control', 'id' => 'role_id', $profile ? 'disabled' : '']); ?>

        </div>
        <div class="form-group">
            <label for="status"><?php echo app('translator')->getFromJson('app.status'); ?></label>
            <?php echo Form::select('status', $statuses, $edit ? $user->status : '',
                ['class' => 'form-control', 'id' => 'status', $profile ? 'disabled' : '']); ?>

        </div>
        <div class="form-group">
            <label for="first_name"><?php echo app('translator')->getFromJson('app.first_name'); ?></label>
            <input type="text" class="form-control" id="first_name"
                   name="first_name" placeholder="<?php echo app('translator')->getFromJson('app.first_name'); ?>" value="<?php echo e($edit ? $user->first_name : ''); ?>">
        </div>
        <div class="form-group">
            <label for="last_name"><?php echo app('translator')->getFromJson('app.last_name'); ?></label>
            <input type="text" class="form-control" id="last_name"
                   name="last_name" placeholder="<?php echo app('translator')->getFromJson('app.last_name'); ?>" value="<?php echo e($edit ? $user->last_name : ''); ?>">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="birthday"><?php echo app('translator')->getFromJson('app.date_of_birth'); ?></label>
            <div class="form-group">
                <input type="text"
                       name="birthday"
                       id='birthday'
                       value="<?php echo e($edit && $user->birthday ? $user->present()->birthday : ''); ?>"
                       class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label for="phone"><?php echo app('translator')->getFromJson('app.phone'); ?></label>
            <input type="text" class="form-control" id="phone"
                   name="phone" placeholder="<?php echo app('translator')->getFromJson('app.phone'); ?>" value="<?php echo e($edit ? $user->phone : ''); ?>">
        </div>
        <div class="form-group">
            <label for="address"><?php echo app('translator')->getFromJson('app.address'); ?></label>
            <input type="text" class="form-control" id="address"
                   name="address" placeholder="<?php echo app('translator')->getFromJson('app.address'); ?>" value="<?php echo e($edit ? $user->address : ''); ?>">
        </div>
        <div class="form-group">
            <label for="address"><?php echo app('translator')->getFromJson('app.country'); ?></label>
            <?php echo Form::select('country_id', $countries, $edit ? $user->country_id : '', ['class' => 'form-control']); ?>

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

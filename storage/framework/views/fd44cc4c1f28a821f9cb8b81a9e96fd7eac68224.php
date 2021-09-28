<div class="form-group">
    <label for="email"><?php echo app('translator')->getFromJson('app.email'); ?></label>
    <input type="email" class="form-control" id="email"
           name="email" placeholder="<?php echo app('translator')->getFromJson('app.email'); ?>" value="<?php echo e($edit ? $user->email : ''); ?>">
</div>
<div class="form-group">
    <label for="username"><?php echo app('translator')->getFromJson('app.username'); ?></label>
    <input type="text" class="form-control" id="username" placeholder="(<?php echo app('translator')->getFromJson('app.optional'); ?>)"
           name="username" value="<?php echo e($edit ? $user->username : ''); ?>">
</div>
<div class="form-group">
    <label for="password"><?php echo e($edit ? trans("app.new_password") : trans('app.password')); ?></label>
    <input type="password" class="form-control" id="password"
           name="password" <?php if($edit): ?> placeholder="<?php echo app('translator')->getFromJson('app.leave_blank_if_you_dont_want_to_change'); ?>" <?php endif; ?>>
</div>
<div class="form-group">
    <label for="password_confirmation"><?php echo e($edit ? trans("app.confirm_new_password") : trans('app.confirm_password')); ?></label>
    <input type="password" class="form-control" id="password_confirmation"
           name="password_confirmation" <?php if($edit): ?> placeholder="<?php echo app('translator')->getFromJson('app.leave_blank_if_you_dont_want_to_change'); ?>" <?php endif; ?>>
</div>
<?php if($edit): ?>
    <button type="submit" class="btn btn-primary mt-2" id="update-login-details-btn">
        <i class="fa fa-refresh"></i>
        <?php echo app('translator')->getFromJson('app.update_details'); ?>
    </button>
<?php endif; ?>
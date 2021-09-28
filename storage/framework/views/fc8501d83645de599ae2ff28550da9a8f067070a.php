<div class="avatar-wrapper">
    <div class="spinner">
        <div class="spinner-dot"></div>
        <div class="spinner-dot"></div>
        <div class="spinner-dot"></div>
    </div>
    <div id="avatar"></div>
    <div class="text-center">
        <div class="avatar-preview">
            <img class="avatar rounded-circle img-thumbnail img-responsive mt-5 mb-4"
                 width="150"
                 src="<?php echo e($edit ? $user->present()->avatar : url('assets/img/profile.png')); ?>">

            <h5 class="text-muted"><?php echo e($user->present()->nameOrEmail); ?></h5>
        </div>

        <div id="change-picture" class="btn btn-outline-secondary btn-block mt-5" data-toggle="modal" data-target="#choose-modal">
            <i class="fa fa-camera"></i>
            <?php echo app('translator')->getFromJson('app.change_photo'); ?>
        </div>

        <div class="row avatar-controls d-none">
            <div class="col-md-6">
                <div id="cancel-upload" class="btn btn-block btn-outline-secondary text-center">
                    <i class="fa fa-times"></i> <?php echo app('translator')->getFromJson('app.cancel'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <button type="submit" id="save-photo" class="btn btn-success btn-block text-center">
                    <i class="fa fa-check"></i> <?php echo app('translator')->getFromJson('app.save'); ?>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="choose-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4 avatar-source" id="no-photo"
                         data-url="<?php echo e($updateUrl); ?>">
                        <img src="<?php echo e(url('assets/img/profile.png')); ?>" class="rounded-circle img-thumbnail img-responsive">
                        <p class="mt-3"><?php echo app('translator')->getFromJson('app.no_photo'); ?></p>
                    </div>
                    <div class="col-md-4 avatar-source">
                        <div class="btn btn-light btn-upload">
                            <i class="fa fa-upload"></i>
                            <input type="file" name="avatar" id="avatar-upload">
                        </div>
                        <p class="mt-3"><?php echo app('translator')->getFromJson('app.upload_photo'); ?></p>
                    </div>
                    <?php if($edit): ?>
                        <div class="col-md-4 avatar-source source-external"
                             data-url="<?php echo e($updateUrl); ?>">
                            <img src="<?php echo e($user->gravatar()); ?>" class="rounded-circle img-thumbnail img-responsive">
                            <p class="mt-3"><?php echo app('translator')->getFromJson('app.gravatar'); ?></p>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if($edit && count($socialLogins)): ?>
                    <?php $__currentLoopData = $socialLogins->chunk(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $socialLoginsSet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <br>
                        <div class="row">
                            <?php $__currentLoopData = $socialLoginsSet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $login): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-4 avatar-source source-external"
                                     data-url="<?php echo e($updateUrl); ?>">
                                    <img src="<?php echo e($login->avatar); ?>" class="rounded-circle img-thumbnail img-responsive" style="width: 120px;">
                                    <p><?php echo e(ucfirst($login->provider)); ?></p>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="d-none">
    <input type="hidden" name="points[x1]" id="points_x1">
    <input type="hidden" name="points[y1]" id="points_y1">
    <input type="hidden" name="points[x2]" id="points_x2">
    <input type="hidden" name="points[y2]" id="points_y2">
</div>

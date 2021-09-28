<?php $__env->startSection('title', 'Forbidden!'); ?>

<?php $__env->startSection('content'); ?>
    <h1 class="mt-5">Forbidden!</h1>
    <p class="lead">You don't have permission to access this page.</p>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
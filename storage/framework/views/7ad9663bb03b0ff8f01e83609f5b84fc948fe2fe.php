<?php
/**
 * @var VanguardDK\Model\PaymentSystem $paymentSystem
 * @var VanguardDK\Model\PaymentTask $paymentTask
 */
?>


<?php $__env->startSection('page-title', 'Система оплаты'); ?>
<?php $__env->startSection('page-heading', 'Запросы вывода'); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item active">
        Система оплаты
    </li>
    <li class="breadcrumb-item active">
        Запросы вывода
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('backend.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="card">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-borderless table-striped">
                    <thead>
                    <tr>
                        <th>Email</th>
                        <th>Баланс</th>
                        <th>Сумма</th>
                        <th>Система</th>
                        <th>Аккаунт</th>
                        <th>Убрать</th>
                        <th>Статус</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $paymentTasks->items(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paymentTask): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <?php echo e($paymentTask->user['email']); ?>

                        </td>
                        <td>
                            <?php echo e($paymentTask->user['balance']); ?>

                        </td>
                        <td>
                            <?php echo e($paymentTask->amount); ?>

                        </td>
                        <td>
                            <?php echo e(ucwords(str_replace('_', ' ', $paymentTask->system['type']))); ?>

                        </td>
                        <td>
                            <?php echo e($paymentTask->account); ?>

                        </td>
                        <td class="align-middle">
                            <?php if($paymentTask->isActive()): ?>
                            <a class="outPayment btn btn-icon"
                               href="#"
                               data-toggle="modal"
                               data-target="#out-modal"
                               data-id="<?php echo e($paymentTask->user_id); ?>"
                               data-amount="<?php echo e($paymentTask->amount); ?>"
                               data-task_id="<?php echo e($paymentTask->id); ?>">
                                <i class="fa fa-minus-circle" aria-hidden="true"></i>
                            </a>
                            <?php endif; ?>
                        </td>
                        <td class="align-middle">
                            <?php if($paymentTask->isActive()): ?>
                            <span class="badge badge-lg badge-success">
                                Active
                            </span>
                            <?php else: ?>
                            <span class="badge badge-lg badge-secondary">
                                Completed
                            </span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer clearfix">
            <div class="col-12">
                <?php echo e($paymentTasks->links()); ?>

            </div>
        </div>
    </div>
    <div class="modal fade" id="out-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="<?php echo e(route('backend.user.balance.update')); ?>" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo app('translator')->getFromJson('app.balance'); ?> <?php echo app('translator')->getFromJson('app.pay_out'); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="OutSum"><?php echo app('translator')->getFromJson('app.sum'); ?></label>
                            <input type="number" class="form-control" id="OutSum" name="summ" placeholder="<?php echo app('translator')->getFromJson('app.sum'); ?>" required>
                            <input type="hidden" name="type" value="out">
                            <input type="hidden" id="OutId" name="user_id">
                            <input type="hidden" id="task-Id" name="task_Id">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo app('translator')->getFromJson('app.close'); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo app('translator')->getFromJson('app.pay_out'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('assets/js/adminpanel.js')); ?>"></script>
    <script>
        $(function () {
            $('.outPayment').click(function () {
                var $this = $(this);

                $('#OutId').val($this.data('id'));
                $('#OutSum').val($this.data('amount'));
                $('#task-Id').val($this.data('task_id'));
            });

            $('#out-modal form').on('submit', function (e) {
                e.preventDefault();

                var $this = $(this);

                $('button', $this).prop('disabled', true);

                $.ajax({
                    type: $this.attr('method'),
                    url: $this.attr('action'),
                    data: $this.serialize(),
                    success: function () {
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo e(route('backend.payment.task.update')); ?>',
                            data: {
                                'id': $('#task-Id', $this).val(),
                                'status': 2,
                                '_token': '<?php echo e(csrf_token()); ?>',
                            },
                            success: function () {
                                location.reload();
                            }
                        });
                    },
                    complete: function() {
                        $('button', $this).prop('disabled', false);
                    }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
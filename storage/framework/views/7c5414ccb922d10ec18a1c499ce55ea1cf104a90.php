<?php
/**
 * @var VanguardDK\Model\PaymentSystem $paymentSystem
 */
?>


<?php $__env->startSection('page-title', 'Система оплаты'); ?>
<?php $__env->startSection('page-heading', 'Система оплаты'); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item active">
        Система оплаты
    </li>
    <li class="breadcrumb-item active">
        Настройки вывода
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('backend.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <style>
        /* Tabs */

        .box {
            padding: 5px 25px;
        }

        ul.tabs {
            margin: 0px;
            padding: 0px;
            list-style: none;
        }

        ul.tabs li {
            background: none;
            color: #222;
            display: inline-block;
            padding: 10px 15px;
            cursor: pointer;
        }

        ul.tabs li.current {
            background: #ededed;
            color: #222;
        }

        .tab-content {
            display: none;
            background: #ededed;
            padding: 15px;
        }

        .tab-content.current {
            display: inherit;
        }


        /* Switch */
        .switch-field {
            display: flex;
            overflow: hidden;
        }

        .switch-field input {
            position: absolute !important;
            clip: rect(0, 0, 0, 0);
            height: 1px;
            width: 1px;
            border: 0;
            overflow: hidden;
        }

        .switch-field label {
            background-color: #e4e4e4;
            color: rgba(0, 0, 0, 0.6);
            font-size: 14px;
            line-height: 1;
            text-align: center;
            padding: 8px 16px;
            margin-right: -1px;
            border: 1px solid rgba(0, 0, 0, 0.2);
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);
            transition: all 0.1s ease-in-out;
        }

        .switch-field label:hover {
            cursor: pointer;
        }

        .switch-field input:checked + label {
            background-color: #5cb85c;
            box-shadow: none;
        }

        .switch-field input.radio-off:checked + label {
            background-color: #d9534f;
            box-shadow: none;
        }

        .switch-field label:first-of-type {
            border-radius: 4px 0 0 4px;
        }

        .switch-field label:last-of-type {
            border-radius: 0 4px 4px 0;
        }
    </style>
    <div class="card">
        <ul class="tabs">
            <?php $__currentLoopData = $paymentSystems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $paymentSystem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="tab-link <?php if($key === 0): ?> current <?php endif; ?>"
                    data-tab="tab-<?php echo e($paymentSystem->id); ?>"><?php echo e($paymentSystem->getName()); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <?php $__currentLoopData = $paymentSystems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $paymentSystem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div id="tab-<?php echo e($paymentSystem->id); ?>" class="tab-content <?php if($key === 0): ?> current <?php endif; ?>">
                <div class="card-body">
                    <form class="form-payment-system" action="<?php echo e(route('backend.payment.system.update')); ?>" method="POST">
                        <input type="hidden" name="type" value="<?php echo e($paymentSystem->type); ?>">
                        <input type="hidden" name="operation" value="<?php echo e($paymentSystem->operation); ?>">
                        <div class="row">
                            <label class="col-md-2 box">Статус</label>
                            <div class="col-md-10 box">
                                <div class="switch-field">
                                    <input type="radio"
                                           id="radio-on-<?php echo e($paymentSystem->id); ?>"
                                           name="active"
                                           value="1" <?php if($paymentSystem->active): ?> checked="checked" <?php endif; ?>/>
                                    <label for="radio-on-<?php echo e($paymentSystem->id); ?>">Вкл</label>
                                    <input type="radio"
                                           class="radio-off"
                                           id="radio-off-<?php echo e($paymentSystem->id); ?>"
                                           name="active"
                                           value="0" <?php if(!$paymentSystem->active): ?> checked="checked" <?php endif; ?>/>
                                    <label for="radio-off-<?php echo e($paymentSystem->id); ?>">Вык</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2 box">Мин. сумма</label>
                            <div class="col-md-10 box">
                                <input type="text" class="form-control" name="min_amount"
                                       value="<?php echo e($paymentSystem->min_amount); ?>">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2 box">Макс. сумма</label>
                            <div class="col-md-10 box">
                                <input type="text" class="form-control" name="max_amount"
                                       value="<?php echo e($paymentSystem->max_amount); ?>">
                            </div>
                        </div>
                        <div class="row">
                            <input type="hidden" value="<?= csrf_token() ?>" name="_token">
                            <label class="col-md-2 box"></label>
                            <div class="col-md-10 box">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('assets/js/adminpanel.js')); ?>"></script>
    <script>
        $(function () {
            $('.form-payment-system').on('submit', function (e) {
                e.preventDefault();
                $(this).ajaxSendForm();
            });

            $('ul.tabs li').click(function () {
                var tab_id = $(this).attr('data-tab');

                $('ul.tabs li').removeClass('current');
                $('.tab-content').removeClass('current');

                $(this).addClass('current');
                $("#" + tab_id).addClass('current');
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
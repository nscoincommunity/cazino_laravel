<?php
/**
 * @var VanguardDK\Model\PaymentSystem $paymentSystem
 * @var VanguardDK\Model\PaymentTask $paymentTask
 */
?>
@extends('backend.layouts.app')

@section('page-title', 'Система оплаты')
@section('page-heading', 'Запросы вывода')

@section('breadcrumbs')
    <li class="breadcrumb-item active">
        Система оплаты
    </li>
    <li class="breadcrumb-item active">
        Запросы вывода
    </li>
@stop

@section('content')

    @include('backend.partials.messages')

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
                    @foreach($paymentTasks->items() as $paymentTask)
                    <tr>
                        <td>
                            {{$paymentTask->user['email']}}
                        </td>
                        <td>
                            {{$paymentTask->user['balance']}}
                        </td>
                        <td>
                            {{$paymentTask->amount}}
                        </td>
                        <td>
                            {{ucwords(str_replace('_', ' ', $paymentTask->system['type']))}}
                        </td>
                        <td>
                            {{$paymentTask->account}}
                        </td>
                        <td class="align-middle">
                            @if($paymentTask->isActive())
                            <a class="outPayment btn btn-icon"
                               href="#"
                               data-toggle="modal"
                               data-target="#out-modal"
                               data-id="{{$paymentTask->user_id}}"
                               data-amount="{{$paymentTask->amount}}"
                               data-task_id="{{$paymentTask->id}}">
                                <i class="fa fa-minus-circle" aria-hidden="true"></i>
                            </a>
                            @endif
                        </td>
                        <td class="align-middle">
                            @if($paymentTask->isActive())
                            <span class="badge badge-lg badge-success">
                                Active
                            </span>
                            @else
                            <span class="badge badge-lg badge-secondary">
                                Completed
                            </span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer clearfix">
            <div class="col-12">
                {{$paymentTasks->links()}}
            </div>
        </div>
    </div>
    <div class="modal fade" id="out-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{route('backend.user.balance.update')}}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">@lang('app.balance') @lang('app.pay_out')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="OutSum">@lang('app.sum')</label>
                            <input type="number" class="form-control" id="OutSum" name="summ" placeholder="@lang('app.sum')" required>
                            <input type="hidden" name="type" value="out">
                            <input type="hidden" id="OutId" name="user_id">
                            <input type="hidden" id="task-Id" name="task_Id">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('app.close')</button>
                        <button type="submit" class="btn btn-primary">@lang('app.pay_out')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script src="{{asset('assets/js/adminpanel.js')}}"></script>
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
                            url: '{{route('backend.payment.task.update')}}',
                            data: {
                                'id': $('#task-Id', $this).val(),
                                'status': 2,
                                '_token': '{{csrf_token()}}',
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
@stop

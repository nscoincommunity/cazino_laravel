@extends('backend.layouts.app')

@section('page-title', trans('app.users'))
@section('page-heading', trans('app.users'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">
        @lang('app.users')
    </li>
@stop

@section('content')

@include('backend.partials.messages')

<div class="card">
    <div class="card-body">

        <form action="" method="GET" id="users-form" class="pb-2 mb-3 border-bottom-light">
            <div class="row my-3 flex-md-row flex-column-reverse">
                <div class="col-md-4 mt-md-0 mt-2">
                    <div class="input-group custom-search-form">
                        <input type="text"
                               class="form-control input-solid"
                               name="search"
                               value="{{ Input::get('search') }}"
                               placeholder="@lang('app.search_for_users')">

                            <span class="input-group-append">
                                @if (Input::has('search') && Input::get('search') != '')
                                    <a href="{{ route('backend.user.list') }}"
                                           class="btn btn-light d-flex align-items-center text-muted"
                                           role="button">
                                        <i class="fas fa-times"></i>
                                    </a>
                                @endif
                                <button class="btn btn-light" type="submit" id="search-users-btn">
                                    <i class="fas fa-search text-muted"></i>
                                </button>
                            </span>
                    </div>
                </div>

                <div class="col-md-2 mt-2 mt-md-0">
                    {!! Form::select('status', $statuses, Input::get('status'), ['id' => 'status', 'class' => 'form-control input-solid']) !!}
                </div>

                <div class="col-md-6">
                    <a href="{{ route('backend.user.create') }}" class="btn btn-primary btn-rounded float-right">
                        <i class="fas fa-plus mr-2"></i>
                        @lang('app.add_user')
                    </a>
                </div>
            </div>
        </form>

        <div class="table-responsive" id="users-table-wrapper">
            <table class="table table-borderless table-striped">
                <thead>
                <tr>
                    <th class="min-width-100">Img</th>
                    <th class="min-width-100">@lang('app.username')</th>
                    <th class="min-width-100">@lang('app.email')</th>
					
					@permission('users.balance.manage')
					<th class="min-width-100">@lang('app.balance')</th>
					<th class="min-width-100">@lang('app.pay_in')</th>
					<th class="min-width-100">@lang('app.pay_out')</th>
					@endpermission
					
                    <th class="min-width-100">@lang('app.status')</th>
                    <th class="text-center min-width-100">@lang('app.action')</th>
                </tr>
                </thead>
                <tbody>
                    @if (count($users))
                        @foreach ($users as $user)
                            @include('backend.user.partials.row')
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10"><em>@lang('app.no_records_found')</em></td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
		
		
		
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="openAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
			<form action="{{ route('backend.user.balance.update') }}" method="POST">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">@lang('app.balance') @lang('app.pay_in')</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="AddSum">@lang('app.sum')</label>
						<input type="number" class="form-control" id="AddSum" name="summ" placeholder="@lang('app.sum')" required>
						<input type="hidden" name="type" value="add">
						<input type="hidden" id="AddId" name="user_id">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('app.close')</button>
					<button type="submit" class="btn btn-primary">@lang('app.pay_in')</button>
				</div>
			</form>
        </div>
    </div>
</div>

<div class="modal fade" id="openOutModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
			<form action="{{ route('backend.user.balance.update') }}" method="POST">
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
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
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

{{ $users->appends(Request::except('page'))->links() }}

@stop

@section('scripts')
    <script>
        $("#status").change(function () {
            $("#users-form").submit();
        });
		$('.addPayment').click(function(event){		
			if( $(event.target).is('.newPayment') ){
				var id = $(event.target).attr('data-id');
			}else{
				var id = $(event.target).parents('.newPayment').attr('data-id');
			}			
			$('#AddId').val(id);			
		});
		
		$('.outPayment').click(function(event){			
			if( $(event.target).is('.newPayment') ){
				var id = $(event.target).attr('data-id');
			}else{
				var id = $(event.target).parents('.newPayment').attr('data-id');
			}		
			$('#OutId').val(id);			
		});
    </script>
@stop

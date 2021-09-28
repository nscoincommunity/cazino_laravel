@extends('backend.layouts.app')

@section('page-title', trans('app.jackpots'))
@section('page-heading', trans('app.jackpots'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">
        @lang('app.jackpots')
    </li>
@stop

@section('content')

@include('backend.partials.messages')

<div class="card">
    <div class="card-body">
	
		<form action="" method="GET" id="users-form" class="pb-2 mb-3 border-bottom-light">
            <div class="row my-3 flex-md-row flex-column-reverse">
                <div class="col-md-4 mt-md-0 mt-2"></div>
                <div class="col-md-2 mt-2 mt-md-0"></div>
                <div class="col-md-6">
					<a href="{{ route('backend.jackpot.create') }}" class="btn btn-primary btn-rounded float-right">
                        <i class="fas fa-plus mr-2"></i>
                        @lang('app.add_jackpot')
                    </a>
                </div>
            </div>
        </form>
	
        <div class="table-responsive" id="users-table-wrapper">
            <table class="table table-borderless table-striped">
                <thead>
                <tr>
                    <th class="min-width-100">Title</th>
                    <th class="min-width-100">Balance</th>
					<th class="min-width-100">@lang('app.pay_in')</th>
					<th class="min-width-100">@lang('app.pay_out')</th> 
					<th class="min-width-100">Pay Sum</th>						                   
					<th class="min-width-100">Percent</th>					
                    <th class="text-center min-width-100">@lang('app.action')</th>
                </tr>
                </thead>
                <tbody>
                    @if (count($jackpots))
                        @foreach ($jackpots as $jackpot)
                            @include('backend.jackpots.partials.row')
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8"><em>@lang('app.no_records_found')</em></td>
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
			<form action="{{ route('backend.jackpot.balance') }}" method="POST">
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
						<input type="hidden" id="AddId" name="jackpot_id">
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
			<form action="{{ route('backend.jackpot.balance') }}" method="POST">
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
						<input type="hidden" id="OutId" name="jackpot_id">
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


@stop

@section('scripts')
	<script>
        $("#status").change(function () {
            $("#users-form").submit();
        });
		$('.addPayment').click(function(event){	
			console.log($(event.target));
			var item = $(event.target).hasClass('addPayment') ? $(event.target) : $(event.target).parent();
			var id = item.attr('data-id');
			$('#AddId').val(id);			
		});
		
		$('.outPayment').click(function(event){		
			console.log($(event.target));
			var item = $(event.target).hasClass('outPayment') ? $(event.target) : $(event.target).parent();
			var id = item.attr('data-id');
			$('#OutId').val(id);			
		});
    </script>
@stop

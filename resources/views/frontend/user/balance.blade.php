 @extends('frontend.layouts.app')

@section('page-title', trans('app.balance'))
@section('page-heading', trans('app.balance'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">
        @lang('app.balance')
    </li>
@stop

@section('content')

@include('frontend.partials.messages')


<div class="card">
    <div class="card-body">
	
		<h1>@lang('app.balance')</h1>
	
		<form action="<?= route('frontend.profile.balance.post') ?>" method="POST">
			<table>
				<tbody>
				<tr>		
					<td>
						<select class="form-control" name="type">
							<option value="piastrix">@lang('app.piastrix')</option>
							<option value="coinpayment">@lang('app.coinpayment')</option>
						</select>
					</td>
					<td>
						<input class="form-control text" type="text" placeholder="@lang('app.sum')" id="addsumm" name="summ" value="5">						
						<input type="hidden" name="_token" value="<?= csrf_token() ?>">
					</td>				
					<td>
						<button class="btn btn-large btn-info" type="submit" id="checksumm">@lang('app.add')</button>
					</td>
				</tr>
				</tbody>
			</table>
		</form>
		
		<hr>

        <div class="table-responsive" id="users-table-wrapper">
            <table class="table table-borderless table-striped">
                <thead>
                <tr>
                    <th class="min-width-100">@lang('app.date')</th>
					<th class="min-width-100">@lang('app.sum')</th>
					<th class="min-width-100">@lang('app.payment_system')</th>
					<th class="min-width-100">@lang('app.status')</th>
                </tr>
                </thead>
                <tbody>
                    @if (count($history))
                        @foreach ($history as $item)
                           @include('frontend.user.partials.balance_row')
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6"><em>@lang('app.no_records_found')</em></td>
                        </tr>
                    @endif
                </tbody>
            </table>
			<div style="margin: 0 auto;">
				{{ $history->links() }}
			</div>
        </div>
    </div>
</div>

@stop
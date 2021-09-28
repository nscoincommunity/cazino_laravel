 @extends('backend.layouts.app')

@section('page-title', trans('app.statistics'))
@section('page-heading', trans('app.statistics'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">
        @lang('app.statistics')
    </li>
@stop

@section('content')

@include('backend.partials.messages')

<style>
.box {
    padding: 5px 25px;
}
</style>

<div class="card">
    <div class="card-body">
	
		<form action="" method="GET">
            <div class="row">
				<label class="col-md-2 box">System</label>
                <div class="col-md-10 box">
                    <input type="text" class="form-control" name="system" value="{{ Input::get('system') }}">                   
                </div>
            </div>
			<div class="row">
				<label class="col-md-2 box">Type</label>
                <div class="col-md-10 box">
					<select name="type" class="form-control">
						<option value="" @if (Input::get('type') == '') selected @endif>All</option>
						<option value="add" @if (Input::get('type') == 'add') selected @endif>Add</option>
						<option value="out" @if (Input::get('type') == 'out') selected @endif>Out</option>
					</select>                  
                </div>
            </div>
			<div class="row">
				<label class="col-md-2 box">Payeer</label>
                <div class="col-md-10 box">
                    <input type="text" class="form-control" name="payeer" value="{{ Input::get('payeer') }}">                   
                </div>
            </div>
			<div class="row">
				<label class="col-md-2 box">User</label>
                <div class="col-md-10 box">
                    <input type="text" class="form-control" name="user" value="{{ Input::get('user') }}">                   
                </div>
            </div>
			<div class="row">
				<label class="col-md-2 box">Sum</label>
                <div class="col-md-5 box">
                    <input type="text" class="form-control" name="sum_from" value="{{ Input::get('sum_from') }}">                   
                </div>
				<div class="col-md-5 box">
                    <input type="text" class="form-control" name="sum_to" value="{{ Input::get('sum_to') }}">                   
                </div>
            </div>
			<div class="row">
				<label class="col-md-2 box">DateTime</label>
                <div class="col-md-10 box">
                    <input type="text" class="form-control" name="dates" value="{{ Input::get('dates') }}">                     
                </div>
            </div>
			<div class="row">
				<label class="col-md-2 box"></label>
                <div class="col-md-10 box">
                    <button type="submit" class="btn btn-primary">Filter</button>            
                </div>
            </div>
        </form>
		
		<hr>

        <div class="table-responsive" id="users-table-wrapper">
            <table class="table table-borderless table-striped">
                <thead>
                <tr>
                    <th class="min-width-100">Ico</th>
                    <th class="min-width-100">@lang('app.system')</th>
					<th class="min-width-100">@lang('app.type') @lang('app.sum')</th>
					<th class="min-width-100">@lang('app.user')</th>
					<th class="min-width-100">@lang('app.date')</th>
                </tr>
                </thead>
                <tbody>
                    @if (count($statistics))
                        @foreach ($statistics as $stat)
                           @include('backend.user.partials.stat_row')
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6"><em>@lang('app.no_records_found')</em></td>
                        </tr>
                    @endif
                </tbody>
            </table>
			<div style="margin: 0 auto;">
				{{ $statistics->appends(Request::except('page'))->links() }}
			</div>
        </div>
    </div>
</div>

@stop

@section('scripts')
    <script>
		$(function() {
			$('input[name="dates"]').daterangepicker({
				timePicker: true,
				timePicker24Hour: true,
				startDate: moment().subtract(30, 'day'),
				endDate: moment().add(7, 'day'),				
				
				locale: {
					format: 'YYYY-MM-DD HH:mm'
				}
			});
		});		
    </script>
@stop

@extends('backend.layouts.app')

@section('page-title', trans('app.game_stat'))
@section('page-heading', trans('app.game_stat'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">
        @lang('app.game_stat')
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
				<label class="col-md-2 box">Game</label>
                <div class="col-md-10 box">
                    <input type="text" class="form-control" name="game" value="{{ Input::get('game') }}">                   
                </div>
            </div>
			<div class="row">
				<label class="col-md-2 box">User</label>
                <div class="col-md-10 box">
                    <input type="text" class="form-control" name="user" value="{{ Input::get('user') }}">                   
                </div>
            </div>
			<div class="row">
				<label class="col-md-2 box">Balance</label>
                <div class="col-md-5 box">
                    <input type="text" class="form-control" name="balance_from" value="{{ Input::get('balance_from') }}">                   
                </div>
				<div class="col-md-5 box">
                    <input type="text" class="form-control" name="balance_to" value="{{ Input::get('balance_to') }}">                   
                </div>
            </div>
			<div class="row">
				<label class="col-md-2 box">Bet</label>
                <div class="col-md-5 box">
                    <input type="text" class="form-control" name="bet_from" value="{{ Input::get('bet_from') }}">                   
                </div>
				<div class="col-md-5 box">
                    <input type="text" class="form-control" name="bet_to" value="{{ Input::get('bet_to') }}">                   
                </div>
            </div>
			<div class="row">
				<label class="col-md-2 box">win</label>
                <div class="col-md-5 box">
                    <input type="text" class="form-control" name="win_from" value="{{ Input::get('win_from') }}">                   
                </div>
				<div class="col-md-5 box">
                    <input type="text" class="form-control" name="win_to" value="{{ Input::get('win_to') }}">                   
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
                    <th class="min-width-100">Game</th>
                    <th class="min-width-100">User</th>					
					<th class="min-width-100">Balance</th>
					<th class="min-width-100">Bet</th>
					<th class="min-width-100">Win</th>					
                    <th class="min-width-100">Date</th>
                </tr>
                </thead>
                <tbody>
                    @if (count($game_stat))
                        @foreach ($game_stat as $stat)
                            @include('backend.games.partials.row_stat')
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7"><em>@lang('app.no_records_found')</em></td>
                        </tr>
                    @endif
                </tbody>
            </table>
			
			<div style="margin: 0 auto;">
				{{ $game_stat->appends(Request::except('page'))->links() }}
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
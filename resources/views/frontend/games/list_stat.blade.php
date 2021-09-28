@extends('frontend.layouts.app')

@section('page-title', trans('app.game_stat'))
@section('page-heading', trans('app.game_stat'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">
        @lang('app.game_stat')
    </li>
@stop

@section('content')

@include('frontend.partials.messages')

<div class="card">
    <div class="card-body">

        <div class="table-responsive" id="users-table-wrapper">
            <table class="table table-borderless table-striped">
                <thead>
                <tr>
				    <th class="min-width-100">Ico</th>
                    <th class="min-width-100">Game</th>				
					<th class="min-width-100">Balance</th>
					<th class="min-width-100">Bet</th>
					<th class="min-width-100">Win</th>					
                    <th class="min-width-100">Date</th>
                </tr>
                </thead>
                <tbody>
                    @if (count($game_stat))
                        @foreach ($game_stat as $stat)
                            @include('frontend.games.partials.row_stat')
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7"><em>@lang('app.no_records_found')</em></td>
                        </tr>
                    @endif
                </tbody>
            </table>
			
			<div style="margin: 0 auto;">
				{{ $game_stat->links() }}
			</div>
        </div>
    </div>
</div>


@stop

@section('scripts')
@stop

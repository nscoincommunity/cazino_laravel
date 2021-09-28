@extends('backend.layouts.app')

@section('page-title', trans('app.edit_jackpot'))
@section('page-heading', $jackpot->title)

@section('breadcrumbs')
    <li class="breadcrumb-item">
        <a href="{{ route('backend.jackpot.list') }}">@lang('app.jackpots')</a>
    </li>
    <li class="breadcrumb-item">
        {{ $jackpot->name }}
    </li>
    <li class="breadcrumb-item active">
        @lang('app.edit')
    </li>
@stop

@section('content')

@include('backend.partials.messages')

{!! Form::open(['route' => array('backend.jackpot.update', $jackpot->id), 'files' => true, 'id' => 'user-form']) !!}
<div class="row">
    <div class="col-lg-6 col-xl-7">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                        @lang('app.jackpot_details')
                </h5>
                @include('backend.jackpots.partials.base', ['edit' => true])
            </div>
		</div>
    </div>
	
    <div class="col-lg-6 col-xl-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                        Jackpot Stat
                </h5>
				
					<table class="table table-borderless table-striped">
						<thead>
						<tr>
							<th class="min-width-100">User</th>					
							<th class="min-width-100">Type</th>
							<th class="min-width-100">Sum</th>					
							<th class="min-width-100">Date</th>
						</tr>
						</thead>
						<tbody>
								@if (count($jackpot_stat))
									@foreach ($jackpot_stat as $stat)
										@include('backend.jackpots.partials.row_stat')
									@endforeach
								@else
									<tr>
										<td colspan="4"><em>@lang('app.no_records_found')</em></td>
									</tr>
								@endif
						</tbody>
					</table>
				
            </div>
		</div>
    </div>
</div>	
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">
                @lang('app.edit_jackpot')
            </button>
        </div>
    </div>
{!! Form::close() !!}

@stop

@section('scripts')
@stop
 @extends('frontend.layouts.app')

@section('page-title', trans('app.statistics'))
@section('page-heading', trans('app.statistics'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">
        @lang('app.statistics')
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
                    <th class="min-width-100">@lang('app.system')</th>
					<th class="min-width-100">@lang('app.type') @lang('app.sum')</th>
					<th class="min-width-100">@lang('app.date')</th>
                </tr>
                </thead>
                <tbody>
                    @if (count($statistics))
                        @foreach ($statistics as $stat)
                           @include('frontend.user.partials.stat_row')
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6"><em>@lang('app.no_records_found')</em></td>
                        </tr>
                    @endif
                </tbody>
            </table>
			<div style="margin: 0 auto;">
				{{ $statistics->links() }}
			</div>
        </div>
    </div>
</div>

@stop
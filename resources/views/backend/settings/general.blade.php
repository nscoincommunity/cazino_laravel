@extends('backend.layouts.app')

@section('page-title', trans('app.general_settings'))
@section('page-heading', trans('app.general_settings'))

@section('breadcrumbs')
    <li class="breadcrumb-item text-muted">
        @lang('app.settings')
    </li>
    <li class="breadcrumb-item active">
        @lang('app.general')
    </li>
@stop

@section('content')

@include('backend.partials.messages')

{!! Form::open(['route' => 'backend.settings.general.update', 'id' => 'general-settings-form']) !!}

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="name">@lang('app.name')</label>
                    <input type="text" class="form-control" id="app_name"
                           name="app_name" value="{{ settings('app_name') }}">
                </div>
				<!--
				<div class="form-group">
                    <label for="start_balance_jackpot">@lang('app.start_balance_jackpot')</label>
                    <input type="text" class="form-control" id="start_balance_jackpot"
                           name="start_balance_jackpot" value="{{ settings('start_balance_jackpot') }}">
                </div>
				-->
            </div>
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary">
    @lang('app.update_settings')
</button>

{{ Form::close() }}
@stop
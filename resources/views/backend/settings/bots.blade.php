@extends('backend.layouts.app')

@section('page-title', trans('app.bots_settings'))
@section('page-heading', trans('app.bots_settings'))

@section('breadcrumbs')
    <li class="breadcrumb-item text-muted">
        @lang('app.settings')
    </li>
    <li class="breadcrumb-item active">
        @lang('app.bots')
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
                    <label for="name">@lang('app.bots_time')</label>
                    <input type="text" class="form-control" id="bots_time"
                           name="bots_time" value="{{ settings('bots_time') }}">
                </div>
				<div class="form-group">
                    <label for="name">@lang('app.bots_login')</label>
                    <input type="text" class="form-control" id="bots_login"
                           name="bots_login" value="{{ settings('bots_login') }}">
                </div>
				<div class="form-group">
                    <label for="name">@lang('app.bots_bet')</label>
                    <input type="text" class="form-control" id="bots_bet"
                           name="bots_bet" value="{{ settings('bots_bet') }}">
                </div>
				<div class="form-group">
                    <label for="name">@lang('app.bots_win')</label>
                    <input type="text" class="form-control" id="bots_win"
                           name="bots_win" value="{{ settings('bots_win') }}">
                </div>
            </div>
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary">
    @lang('app.update_settings')
</button>

{{ Form::close() }}
@stop
@extends('backend.layouts.app')

@section('page-title', trans('app.add_jackpot'))
@section('page-heading', trans('app.add_jackpot'))

@section('breadcrumbs')
    <li class="breadcrumb-item">
        <a href="{{ route('backend.jackpot.list') }}">@lang('app.jackpots')</a>
    </li>
    <li class="breadcrumb-item active">
        @lang('app.create')
    </li>
@stop

@section('content')

@include('backend.partials.messages')

{!! Form::open(['route' => 'backend.jackpot.store', 'files' => true, 'id' => 'user-form']) !!}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <h5 class="card-title">
                        @lang('app.jackpot_details')
                    </h5>
                    <p class="text-muted font-weight-light">
                        A general jackpot information.
                    </p>
                </div>
                <div class="col-md-9">
                    @include('backend.jackpots.partials.base', ['edit' => false])
                </div>
            </div>
        </div>
    </div>
	
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">
                @lang('app.add_jackpot')
            </button>
        </div>
    </div>
{!! Form::close() !!}

<br>
@stop

@section('scripts')
@stop
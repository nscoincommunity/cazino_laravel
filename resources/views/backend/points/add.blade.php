@extends('backend.layouts.app')

@section('page-title', trans('app.add_point'))
@section('page-heading', trans('app.add_point'))

@section('breadcrumbs')
    <li class="breadcrumb-item">
        <a href="{{ route('backend.points.list') }}">@lang('app.points')</a>
    </li>
    <li class="breadcrumb-item active">
        @lang('app.create')
    </li>
@stop

@section('content')

@include('backend.partials.messages')

{!! Form::open(['route' => 'backend.points.store', 'files' => true, 'id' => 'point-form']) !!}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <h5 class="card-title">
                        @lang('app.point_details')
                    </h5>
                    <p class="text-muted font-weight-light">
                        A general point information.
                    </p>
                </div>
                <div class="col-md-9">
                    @include('backend.points.partials.base', ['edit' => false, 'profile' => false])
                </div>
            </div>
        </div>
    </div>

<button type="submit" class="btn btn-primary">@lang('app.add_point')</button>

{!! Form::close() !!}

@stop

@section('scripts')
@stop
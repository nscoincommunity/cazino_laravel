@extends('backend.layouts.app')

@section('page-title', trans('app.edit_point'))
@section('page-heading', $point->title)

@section('breadcrumbs')
    <li class="breadcrumb-item">
        <a href="{{ route('backend.points.list') }}">@lang('app.points')</a>
    </li>
    <li class="breadcrumb-item">
        {{ $point->title }}
    </li>
    <li class="breadcrumb-item active">
        @lang('app.edit')
    </li>
@stop

@section('content')

@include('backend.partials.messages')

{!! Form::open(['route' => array('backend.points.update', $point->id), 'files' => true, 'id' => 'point-form']) !!}
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
                    @include('backend.points.partials.base', ['edit' => true])
                </div>
            </div>
        </div>
    </div>
	
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">
                @lang('app.edit_point')
            </button>
        </div>
    </div>
{!! Form::close() !!}

@stop

@section('scripts')
@stop
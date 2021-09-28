@extends('backend.layouts.app')

@section('page-title', trans('app.edit_return'))
@section('page-heading', $return->min_pay . ' ' . $return->max_pay)

@section('breadcrumbs')
    <li class="breadcrumb-item">
        <a href="{{ route('backend.returns.list') }}">@lang('app.returns')</a>
    </li>
    <li class="breadcrumb-item">
        {{ $return->min_pay . ' ' . $return->max_pay }}
    </li>
    <li class="breadcrumb-item active">
        @lang('app.edit')
    </li>
@stop

@section('content')

@include('backend.partials.messages')

{!! Form::open(['route' => array('backend.returns.update', $return->id), 'files' => true, 'id' => 'return-form']) !!}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <h5 class="card-title">
                        @lang('app.return_details')
                    </h5>
                    <p class="text-muted font-weight-light">
                        A general return information.
                    </p>
                </div>
                <div class="col-md-9">
                    @include('backend.returns.partials.base', ['edit' => true])
                </div>
            </div>
        </div>
    </div>
	
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">
                @lang('app.edit_return')
            </button>
        </div>
    </div>
{!! Form::close() !!}

@stop

@section('scripts')
@stop
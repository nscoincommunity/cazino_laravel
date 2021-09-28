@extends('backend.layouts.app')

@section('page-title', trans('app.add_return'))
@section('page-heading', trans('app.add_return'))

@section('breadcrumbs')
    <li class="breadcrumb-item">
        <a href="{{ route('backend.returns.list') }}">@lang('app.returns')</a>
    </li>
    <li class="breadcrumb-item active">
        @lang('app.create')
    </li>
@stop

@section('content')

@include('backend.partials.messages')

{!! Form::open(['route' => 'backend.returns.store', 'files' => true, 'id' => 'return-form']) !!}
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
                    @include('backend.returns.partials.base', ['edit' => false, 'profile' => false])
                </div>
            </div>
        </div>
    </div>

<button type="submit" class="btn btn-primary">@lang('app.add_return')</button>

{!! Form::close() !!}

@stop

@section('scripts')
@stop
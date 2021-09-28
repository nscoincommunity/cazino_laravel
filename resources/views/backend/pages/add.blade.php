@extends('backend.layouts.app')

@section('page-title', trans('app.add_page'))
@section('page-heading', trans('app.add_page'))

@section('breadcrumbs')
    <li class="breadcrumb-item">
        <a href="{{ route('backend.pages.list') }}">@lang('app.pages')</a>
    </li>
    <li class="breadcrumb-item active">
        @lang('app.create')
    </li>
@stop

@section('content')

@include('backend.partials.messages')

{!! Form::open(['route' => 'backend.pages.store', 'files' => true, 'id' => 'page-form']) !!}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <h5 class="card-title">
                        @lang('app.page_details')
                    </h5>
                    <p class="text-muted font-weight-light">
                        A general page information.
                    </p>
                </div>
                <div class="col-md-9">
                    @include('backend.pages.partials.base', ['edit' => false, 'profile' => false])
                </div>
            </div>
        </div>
    </div>

<button type="submit" class="btn btn-primary">
                @lang('app.add_page')
</button>

{!! Form::close() !!}

@stop

@section('scripts')
    {!! JsValidator::formRequest('VanguardDK\Http\Requests\Page\CreatePageRequest', '#page-form') !!}
@stop
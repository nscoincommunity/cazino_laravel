@extends('backend.layouts.app')

@section('page-title', trans('app.edit_page'))
@section('page-heading', $page->title)

@section('breadcrumbs')
    <li class="breadcrumb-item">
        <a href="{{ route('backend.pages.list') }}">@lang('app.pages')</a>
    </li>
    <li class="breadcrumb-item">
        {{ $page->title }}
    </li>
    <li class="breadcrumb-item active">
        @lang('app.edit')
    </li>
@stop

@section('content')

@include('backend.partials.messages')

{!! Form::open(['route' => array('backend.pages.update', $page->id), 'files' => true, 'id' => 'page-form']) !!}
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
                    @include('backend.pages.partials.base', ['edit' => true])
                </div>
            </div>
        </div>
    </div>
	
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">
                @lang('app.edit_page')
            </button>
        </div>
    </div>
{!! Form::close() !!}

@stop

@section('scripts')
@stop
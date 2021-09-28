@extends('backend.layouts.app')

@section('page-title', trans('app.edit_category'))
@section('page-heading', $category->title)

@section('breadcrumbs')
    <li class="breadcrumb-item">
        <a href="{{ route('backend.category.list') }}">@lang('app.categories')</a>
    </li>
    <li class="breadcrumb-item">
        {{ $category->title }}
    </li>
    <li class="breadcrumb-item active">
        @lang('app.edit')
    </li>
@stop

@section('content')

@include('backend.partials.messages')

{!! Form::open(['route' => array('backend.category.update', $category->id), 'files' => true, 'id' => 'user-form']) !!}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <h5 class="card-title">
                        @lang('app.category_details')
                    </h5>
                    <p class="text-muted font-weight-light">
                        A general category information.
                    </p>
                </div>
                <div class="col-md-9">
                    @include('backend.categories.partials.base', ['edit' => true])
                </div>
            </div>
        </div>
    </div>
	
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">
                @lang('app.edit_category')
            </button>
        </div>
    </div>
{!! Form::close() !!}

@stop

@section('scripts')
@stop
@extends('backend.layouts.app')

@section('page-title', trans('app.permissions'))
@section('page-heading', $edit ? $permission->name : trans('app.create_new_permission'))

@section('breadcrumbs')
    <li class="breadcrumb-item">
        <a href="{{ route('backend.permission.index') }}">@lang('app.permissions')</a>
    </li>
    <li class="breadcrumb-item active">
        {{ $edit ? trans('app.edit') : trans('app.create') }}
    </li>
@stop

@section('content')

@include('backend.partials.messages')

@if ($edit)
    {!! Form::open(['route' => ['backend.permission.update', $permission->id], 'method' => 'PUT', 'id' => 'permission-form']) !!}
@else
    {!! Form::open(['route' => 'backend.permission.store', 'id' => 'permission-form']) !!}
@endif

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <h5 class="card-title">
                    @lang('app.permission_details')
                </h5>
                <p class="text-muted font-weight-light">
                    A general permission information.
                </p>
            </div>
            <div class="col-md-9">
				<div class="form-group">
                    <label for="slug">@lang('app.slug')</label>
                    <input type="text" class="form-control" id="slug"
                           name="slug" placeholder="@lang('app.slug')" value="{{ $edit ? $permission->slug : old('slug') }}">
                </div>
                <div class="form-group">
                    <label for="name">@lang('app.name')</label>
                    <input type="text" class="form-control" id="name"
                           name="name" placeholder="@lang('app.permission_name')" value="{{ $edit ? $permission->name : old('name') }}">
                </div>
                <div class="form-group">
                    <label for="description">@lang('app.description')</label>
                    <textarea name="description" id="description" class="form-control">{{ $edit ? $permission->description : old('description') }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-2">
        <button type="submit" class="btn btn-primary">
            {{ $edit ? trans('app.update_permission') : trans('app.create_permission') }}
        </button>
    </div>
</div>

@stop

@section('scripts')
@stop
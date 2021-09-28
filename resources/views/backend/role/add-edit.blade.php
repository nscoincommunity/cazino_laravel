@extends('backend.layouts.app')

@section('page-title', trans('app.roles'))
@section('page-heading', $edit ? $role->name : trans('app.create_new_role'))

@section('breadcrumbs')
    <li class="breadcrumb-item">
        <a href="{{ route('backend.role.index') }}">@lang('app.roles')</a>
    </li>
    <li class="breadcrumb-item active">
        {{ $edit ? trans('app.edit') : trans('app.create') }}
    </li>
@stop

@section('content')

@include('backend.partials.messages')

@if ($edit)
    {!! Form::open(['route' => ['backend.role.update', $role->id], 'method' => 'PUT', 'id' => 'role-form']) !!}
@else
    {!! Form::open(['route' => 'backend.role.store', 'id' => 'role-form']) !!}
@endif

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <h5 class="card-title">
                    @lang('app.role_details_big')
                </h5>
                <p class="text-muted font-weight-light">
                    A general role information.
                </p>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label for="slug">@lang('app.slug')</label>
                    <input type="text" class="form-control" id="slug"
                           name="slug" placeholder="@lang('app.role_name')" value="{{ $edit ? $role->slug : old('slug') }}">
                </div>
                <div class="form-group">
                    <label for="name">@lang('app.name')</label>
                    <input type="text" class="form-control" id="name"
                           name="name" placeholder="@lang('app.name')" value="{{ $edit ? $role->name : old('name') }}">
                </div>
				<div class="form-group">
                    <label for="level">@lang('app.level')</label>
                    <input type="text" class="form-control" id="level"
                           name="level" placeholder="@lang('app.level')" value="{{ $edit ? $role->level : old('level') }}">
                </div>
                <div class="form-group">
                    <label for="description">@lang('app.description')</label>
                    <textarea name="description" id="description" class="form-control">{{ $edit ? $role->description : old('description') }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary">
    {{ $edit ? trans('app.update_role') : trans('app.create_role') }}
</button>

@stop

@section('scripts')
@stop
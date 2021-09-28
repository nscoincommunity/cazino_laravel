@extends('backend.layouts.app')

@section('page-title', trans('app.permissions'))
@section('page-heading', trans('app.permissions'))

@section ('breadcrumbs')
    <li class="breadcrumb-item active">
        @lang('app.permissions')
    </li>
@stop

@section('content')

@include('backend.partials.messages')

<div class="card">
        <div class="card-body">
            <div class="row mb-3 pb-3 border-bottom-light">
                <div class="col-lg-12">
                    <div class="float-right">
                        <a href="{{ route('backend.permission.create') }}" class="btn btn-primary btn-rounded">
                            <i class="fas fa-plus mr-2"></i>
                            @lang('app.add_permission')
                        </a>
                    </div>
                </div>
            </div>

            <div class="table-responsive" id="users-table-wrapper">
                <table class="table table-striped table-borderless">
                    <thead>
                    <tr>
                        <th class="min-width-100">@lang('app.slug')</th>
                        <th class="min-width-100">@lang('app.name')</th>
						<th class="min-width-100">@lang('app.description')</th>
                        <th class="text-center min-width-100">@lang('app.action')</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if (count($permissions))
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->slug }}</td>
                                    <td>{{ $permission->name }}</td>
									<td>{{ $permission->description }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('backend.permission.edit', $permission->id) }}" class="btn btn-icon"
                                           title="@lang('app.edit_permission')" data-toggle="tooltip" data-placement="top">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('backend.permission.delete', $permission->id) }}" class="btn btn-icon"
                                               title="@lang('app.delete_permission')"
                                               data-toggle="tooltip"
                                               data-placement="top"
                                               data-method="DELETE"
                                               data-confirm-title="@lang('app.please_confirm')"
                                               data-confirm-text="@lang('app.are_you_sure_delete_permission')"
                                               data-confirm-delete="@lang('app.yes_delete_it')">
                                                <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4"><em>@lang('app.no_records_found')</em></td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop

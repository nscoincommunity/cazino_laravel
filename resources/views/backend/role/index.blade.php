@extends('backend.layouts.app')

@section('page-title', trans('app.roles'))
@section('page-heading', trans('app.roles'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">
        @lang('app.roles')
    </li>
@stop

@section('content')

    @include('backend.partials.messages')

    <div class="card">
        <div class="card-body">
            <div class="row mb-3 pb-3 border-bottom-light">
                <div class="col-lg-12">
                    <div class="float-right">
                        <a href="{{ route('backend.role.create') }}" class="btn btn-primary btn-rounded">
                            <i class="fas fa-plus mr-2"></i>
                            @lang('app.add_role')
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
						<th class="min-width-100">@lang('app.level')</th>
                        <th class="min-width-100">@lang('app.users_with_this_role')</th>
                        <th class="text-center min-width-100">@lang('app.action')</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if (count($roles))
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->slug }}</td>
                                    <td>{{ $role->name }}</td>
									<td>{{ $role->level }}</td>
                                    <td>{{ $role->users_count }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('backend.role.edit', $role->id) }}" class="btn btn-icon"
                                           title="@lang('app.edit_role')" data-toggle="tooltip" data-placement="top">
                                            <i class="fas fa-edit"></i>
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

<tr>
    <td style="width: 50px;">
        <a href="{{ route('backend.user.show', $user->id) }}">
            <img
                class="rounded-circle img-responsive"
                width="50"
                src="{{ $user->present()->avatar }}"
                alt="{{ $user->present()->name }}">
        </a>
    </td>
    <td class="align-middle">
        <a href="{{ route('backend.user.show', $user->id) }}">
            {{ $user->username ?: trans('app.n_a') }}
        </a>
    </td>
    <td class="align-middle">{{ $user->email }}</td>
	
	@permission('users.balance.manage')
	<td class="align-middle"><a href="/user/{{ $user->id }}/stat">{{ $user->balance }}</a></td>
	<td class="align-middle"><a class="newPayment addPayment btn btn-icon" href="#" data-toggle="modal" data-target="#openAddModal" data-id="{{ $user->id }}" ><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
	<td class="align-middle"><a class="newPayment outPayment btn btn-icon" href="#" data-toggle="modal" data-target="#openOutModal" data-id="{{ $user->id }}" ><i class="fa fa-minus-circle" aria-hidden="true"></i></a></td>
    @endpermission
	
	<td class="align-middle">
        <span class="badge badge-lg badge-{{ $user->present()->labelClass }}">
            {{ trans("app.{$user->status}") }}
        </span>
    </td>
    <td class="text-center align-middle">
        <div class="dropdown show d-inline-block">
            <a class="btn btn-icon"
               href="#" role="button" id="dropdownMenuLink"
               data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-h"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                @if (config('session.driver') == 'database')
                    <a href="{{ route('backend.user.sessions', $user->id) }}" class="dropdown-item text-gray-500">
                        <i class="fas fa-list mr-2"></i>
                        @lang('app.user_sessions')
                    </a>
                @endif
                <a href="{{ route('backend.user.show', $user->id) }}" class="dropdown-item text-gray-500">
                    <i class="fas fa-eye mr-2"></i>
                    @lang('app.view_user')
                </a>
            </div>
        </div>

        <a href="{{ route('backend.user.edit', $user->id) }}"
           class="btn btn-icon edit"
           title="@lang('app.edit_user')"
           data-toggle="tooltip" data-placement="top">
            <i class="fas fa-edit"></i>
        </a>
		
		@permission('users.delete')
        <a href="{{ route('backend.user.delete', $user->id) }}"
           class="btn btn-icon"
           title="@lang('app.delete_user')"
           data-toggle="tooltip"
           data-placement="top"
           data-method="DELETE"
           data-confirm-title="@lang('app.please_confirm')"
           data-confirm-text="@lang('app.are_you_sure_delete_user')"
           data-confirm-delete="@lang('app.yes_delete_him')">
            <i class="fas fa-trash"></i>
        </a>
		@endpermission
    </td>
</tr>
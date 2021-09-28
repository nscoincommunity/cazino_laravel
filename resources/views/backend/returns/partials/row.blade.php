<tr>        
    <td class="align-middle">{{ $return->min_pay }}</td>
	<td class="align-middle">{{ $return->max_pay }}</td> 
	<td class="align-middle">{{ $return->percent }}</td>
    <td class="text-center align-middle">
        
        <a href="{{ route('backend.returns.edit', $return->id) }}"
           class="btn btn-icon edit"
           title="@lang('app.edit_return')"
           data-toggle="tooltip" data-placement="top">
            <i class="fas fa-edit"></i>
        </a>
        <a href="{{ route('backend.returns.delete', $return->id) }}"
           class="btn btn-icon"
           title="@lang('app.delete_return')"
           data-toggle="tooltip"
           data-placement="top"
           data-method="DELETE"
           data-confirm-title="@lang('app.please_confirm')"
           data-confirm-text="@lang('app.are_you_sure_delete_return')"
           data-confirm-delete="@lang('app.yes_delete_him')">
            <i class="fas fa-trash"></i>
        </a>
    </td>
</tr>
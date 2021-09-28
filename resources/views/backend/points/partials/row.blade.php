<tr>        
    <td class="align-middle">{{ $point->rating }}</td>
	<td class="align-middle">{{ $point->name }}</td> 
	<td class="align-middle">{{ $point->sum }}</td>
	<td class="align-middle">{{ $point->bonus }}</td> 
	<td class="align-middle">{{ $point->exchange }}</td>
    <td class="text-center align-middle">
        
        <a href="{{ route('backend.points.edit', $point->id) }}"
           class="btn btn-icon edit"
           title="@lang('app.edit_point')"
           data-toggle="tooltip" data-placement="top">
            <i class="fas fa-edit"></i>
        </a>
        <a href="{{ route('backend.points.delete', $point->id) }}"
           class="btn btn-icon"
           title="@lang('app.delete_point')"
           data-toggle="tooltip"
           data-placement="top"
           data-method="DELETE"
           data-confirm-title="@lang('app.please_confirm')"
           data-confirm-text="@lang('app.are_you_sure_delete_point')"
           data-confirm-delete="@lang('app.yes_delete_him')">
            <i class="fas fa-trash"></i>
        </a>
    </td>
</tr>
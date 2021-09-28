<tr>        
    <td class="align-middle">{{ $page->title }}</td>
	<td class="align-middle">{{ $page->path }}</td>   
	<td class="align-middle">{{ $page->view ? 'Active' : 'Disabled' }}</td>   
    <td class="text-center align-middle">
        
        <a href="{{ route('backend.pages.edit', $page->id) }}"
           class="btn btn-icon edit"
           title="@lang('app.edit_game')"
           data-toggle="tooltip" data-placement="top">
            <i class="fas fa-edit"></i>
        </a>
		@if ( $page->type == 2 )
        <a href="{{ route('backend.pages.delete', $page->id) }}"
           class="btn btn-icon"
           title="@lang('app.delete_page')"
           data-toggle="tooltip"
           data-placement="top"
           data-method="DELETE"
           data-confirm-title="@lang('app.please_confirm')"
           data-confirm-text="@lang('app.are_you_sure_delete_page')"
           data-confirm-delete="@lang('app.yes_delete_him')">
            <i class="fas fa-trash"></i>
        </a>
		@endif
    </td>
</tr>
<tr>        
    <td class="align-middle"><span class=" @if ($base) badge badge-lg badge-primary @else badge badge-lg badge-secondary @endif ">{{ $category->title }}</span></td>
	<td class="align-middle">{{ $category->position }}</td>
	<td class="align-middle">@if(!$base)/{{ $category->parentOne->href }}@endif/{{ $category->href }}/</td>   
    <td class="text-center align-middle">
        
        <a href="{{ route('backend.category.edit', $category->id) }}"
           class="btn btn-icon edit"
           title="@lang('app.edit_game')"
           data-toggle="tooltip" data-placement="top">
            <i class="fas fa-edit"></i>
        </a>
        <a href="{{ route('backend.category.delete', $category->id) }}"
           class="btn btn-icon"
           title="@lang('app.delete_category')"
           data-toggle="tooltip"
           data-placement="top"
           data-method="DELETE"
           data-confirm-title="@lang('app.please_confirm')"
           data-confirm-text="@lang('app.are_you_sure_delete_category')"
           data-confirm-delete="@lang('app.yes_delete_him')">
            <i class="fas fa-trash"></i>
        </a>
    </td>
</tr>
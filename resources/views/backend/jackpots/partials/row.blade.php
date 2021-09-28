<tr>        
    <td class="align-middle">{{ $jackpot->name }}</td>
	<td class="align-middle">{{ $jackpot->balance }}</td> 
	<td class="align-middle"><a class="addPayment btn btn-icon" href="#" data-toggle="modal" data-target="#openAddModal" data-id="{{ $jackpot->id }}" ><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
	<td class="align-middle"><a class="outPayment btn btn-icon" href="#" data-toggle="modal" data-target="#openOutModal" data-id="{{ $jackpot->id }}" ><i class="fa fa-minus-circle" aria-hidden="true"></i></a></td>
	<td class="align-middle">{{ $jackpot->pay_sum }}</td>
	<td class="align-middle">{{ $jackpot->percent }}</td>
    <td class="text-center align-middle">
        
        <a href="{{ route('backend.jackpot.edit', $jackpot->id) }}"
           class="btn btn-icon edit"
           title="@lang('app.edit_jackpot')"
           data-toggle="tooltip" data-placement="top">
            <i class="fas fa-edit"></i>
        </a>
        <a href="{{ route('backend.jackpot.delete', $jackpot->id) }}"
           class="btn btn-icon"
           title="@lang('app.delete_jackpot')"
           data-toggle="tooltip"
           data-placement="top"
           data-method="DELETE"
           data-confirm-title="@lang('app.please_confirm')"
           data-confirm-text="@lang('app.are_you_sure_delete_jackpot')"
           data-confirm-delete="@lang('app.yes_delete_him')">
            <i class="fas fa-trash"></i>
        </a>
    </td>
</tr>
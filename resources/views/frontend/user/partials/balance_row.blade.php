<tr>
    <td style="width: 50px;">
        {{ $item->created_at }}
    </td>
    <td class="align-middle">
        {{ $item->summ }}
    </td>
	<td class="align-middle">
		{{ $item->system }}
	</td>
	<td class="align-middle">
		@if ($item->status == 1)
			Success
		@elseif( $item->status == -1 )
			Fail
		@else
			Waiting
		@endif
	</td>
    
</tr>
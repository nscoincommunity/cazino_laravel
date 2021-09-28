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
            {{ $stat->admin ? $stat->admin->username : $stat->system }}
    </td>
	<td class="align-middle">
		@if ($stat->type == 'add')
			<span class="badge badge-lg badge-primary">
		@else
			<span class="badge badge-lg badge-danger">
		@endif
		
		{{ abs($stat->summ) }}
		</span>
		
	</td>
    <td class="align-middle">{{ $stat->created_at->format(config('app.date_format')) }}</td>
    
</tr>
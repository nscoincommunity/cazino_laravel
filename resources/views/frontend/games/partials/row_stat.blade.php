<tr>
    <td class="align-middle">
            <img
                class="img-responsive"
                width="80"
                src="{{ $stat->game ? '/ico/' . $stat->name_ico() . '.png' : '' }}"
                alt="{{ $stat->game }}"> 
    </td>
    <td class="align-middle">{{ $stat->game }}</td>
	<td class="align-middle">{{ $stat->balance }}</td>
	<td class="align-middle">{{ $stat->bet }}</td>
	<td class="align-middle">{{ $stat->win }}</td>
	<td class="align-middle">{{ $stat->date_time }}</td>
    
</tr>
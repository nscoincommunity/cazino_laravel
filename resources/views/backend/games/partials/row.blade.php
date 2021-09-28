<tr>
    <td class="align-middle">
            <img
                class="img-responsive"
                width="80"
                src="{{ $game->name ? '/ico/' . $game->name_ico() . '.png' : '' }}"
                alt="{{ $game->title }}">
    </td>
    
    <td class="align-middle"><a href="{{ route('backend.game.edit', $game->id) }}">{{ $game->title }}</a></td>
	<td class="align-middle">{{ $game->gamebank }}</td>
	<td class="align-middle">{{ $game->percent }}</td>
	<td class="align-middle">{{ $game->garant_win }}</td>
	<td class="align-middle">{{ $game->garant_bonus }}</td>
	<td class="align-middle">{{ $game->winline }}</td>
	<td class="align-middle">{{ $game->winbonus }}</td>    
    <td class="text-center align-middle">
        
        <a href="{{ route('backend.game.edit', $game->id) }}"
           class="btn btn-icon edit"
           title="@lang('app.edit_game')"
           data-toggle="tooltip" data-placement="top">
            <i class="fas fa-edit"></i>
        </a>
        <a href="{{ route('backend.game.delete', $game->id) }}"
           class="btn btn-icon"
           title="@lang('app.delete_game')"
           data-toggle="tooltip"
           data-placement="top"
           data-method="DELETE"
           data-confirm-title="@lang('app.please_confirm')"
           data-confirm-text="@lang('app.are_you_sure_delete_game')"
           data-confirm-delete="@lang('app.yes_delete_him')">
            <i class="fas fa-trash"></i>
        </a>
    </td>
<td class="text-center align-middle">
    <div class="custom-control custom-checkbox">
        <input class="custom-control-input" id="cb-[{{ $game->id }}]" name="checkbox[{{ $game->id }}]" type="checkbox">
        <label class="custom-control-label d-inline" for="cb-[{{ $game->id }}]">&nbsp;</label>
    </div>
</td>
</tr>
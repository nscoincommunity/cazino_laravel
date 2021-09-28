<div class="row">
    <div class="col-md-6">
		@if (!$edit || $game->winline !== '')
		<div class="form-group">
            <label for="winline">@lang('app.winline')</label>
            <input type="text" class="form-control" id="winline"
                   name="winline" placeholder="@lang('app.winline')" value="{{ $edit ? $game->winline : '' }}" required>
        </div>
		@endif
		@if (!$edit || $game->winbonus !== '')
		<div class="form-group">
            <label for="winbonus">@lang('app.winbonus')</label>
            <input type="text" class="form-control" id="winbonus"
                   name="winbonus" placeholder="@lang('app.winbonus')" value="{{ $edit ? $game->winbonus : '' }}" required>
        </div>	
		@endif
		@if (!$edit || $game->gamebank !== '')
		<div class="form-group">
            <label for="gamebank">@lang('app.gamebank')</label>
            <input type="text" class="form-control" id="gamebank"
                   name="gamebank" placeholder="@lang('app.gamebank')" value="{{ $edit ? $game->gamebank : '' }}" required>
        </div>
		@endif
    </div>

    <div class="col-md-6">  
		@if (!$edit || $game->garant_win !== '')
        <div class="form-group">
            <label for="garant_win">@lang('app.garant_win')</label>
            <input type="text" class="form-control" id="percent"
                   name="garant_win" placeholder="@lang('app.garant_win')" value="{{ $edit ? $game->garant_win : '' }}" required>
        </div>
		@endif
		@if (!$edit || $game->garant_bonus !== '')
		<div class="form-group">
            <label for="garant_bonus">@lang('app.garant_bonus')</label>
            <input type="text" class="form-control" id="garant_bonus"
                   name="garant_bonus" placeholder="@lang('app.garant_bonus')" value="{{ $edit ? $game->garant_bonus : '' }}" required>
        </div>
		@endif
    </div>
	
	<hr>
	
	@if (!$edit || $game->game_win->winline !== '')
	<div class="col-md-6">
		<div class="form-group">
            <label for="winline">@lang('app.match_winline')</label>
			<textarea class="form-control" id="match_winline" name="match_winline" rows="10" required>{{ $edit ? $game->game_win->winline : '' }}</textarea>
        </div>
    </div>
	@endif
	@if (!$edit || $game->game_win->winbonus !== '')
	<div class="col-md-6">
		<div class="form-group">
            <label for="match_winbonus">@lang('app.match_winbonus')</label>
			<textarea class="form-control" id="match_winbonus" name="match_winbonus" rows="10" required>{{ $edit ? $game->game_win->winbonus : '' }}</textarea>
        </div>
    </div>
	@endif
	
	

    @if ($edit)
        <div class="col-md-12 mt-2">
            <button type="submit" class="btn btn-primary" id="update-details-btn">
                <i class="fa fa-refresh"></i>
                @lang('app.update_details')
            </button>
        </div>
    @endif
</div>

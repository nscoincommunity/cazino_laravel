 <div class="row">
    <div class="col-md-6">
		@if (!$edit || $game->name !== '')
		<div class="form-group">
            <label for="name">@lang('app.name')</label>
            <input type="text" class="form-control" id="name"
                   name="name" placeholder="@lang('app.name')" {{ $edit ? 'disabled' : '' }} value="{{ $edit ? $game->name : '' }}" required>
        </div>
		@endif
		@if (!$edit || $game->title !== '')
		<div class="form-group">
            <label for="title">@lang('app.title')</label>
            <input type="text" class="form-control" id="title"
                   name="title" placeholder="@lang('app.title')" value="{{ $edit ? $game->title : '' }}" required>
        </div>
		@endif
		@if (!$edit || $game->cask !== '')
		<div class="form-group">
            <label for="cask">@lang('app.cask')</label>
            <input type="number" class="form-control" id="cask"
                   name="cask" placeholder="@lang('app.cask')" value="{{ $edit ? $game->cask : '' }}" required>
        </div>
		@endif
		<div class="form-group">
            <label for="device">@lang('app.device')</label>
			<select name="device" id="device" class="form-control" required>
				<option value="0" {{ ($edit && !$game->device==0)? 'selected="selected"' : '' }}>Mobile</option>
				<option value="1" {{ ($edit && $game->device==1)? 'selected="selected"' : '' }}>Desktop</option>
				<option value="2" {{ ($edit && $game->device==2)? 'selected="selected"' : '' }}>Mobile + Desktop</option>
			</select>
        </div>		
		
    </div>

    <div class="col-md-6">        
        @if (!$edit || $game->rezerv !== '')
        <div class="form-group">
            <label for="rezerv">@lang('app.rezerv')</label>
            <input type="number" class="form-control" id="rezerv"
                   name="rezerv" placeholder="@lang('app.rezerv')" value="{{ $edit ? $game->rezerv : '' }}" required>
        </div>		
		@endif
		@if (!$edit || $game->percent !== '')
		<div class="form-group">
            <label for="percent">@lang('app.percent')</label>
            <input type="number" class="form-control" id="percent"
                   name="percent" placeholder="@lang('app.percent')" value="{{ $edit ? $game->percent : '' }}" required>
        </div>
		@endif
		
		@if (!$edit || $game->monitor !== '')
		<div class="form-group">
            <label for="monitor">@lang('app.monitor')</label>
            <select name="monitor" id="monitor" class="form-control" required>
				<option value="1" {{ $edit && $game->monitor == 1? 'selected="selected"' : '' }}>1</option>
				<option value="2" {{ $edit && $game->monitor == 2? 'selected="selected"' : '' }}>2</option>
			</select>
        </div>
		@endif
        
		<div class="form-group">
            <label for="view">@lang('app.view')</label>
			<select name="view" id="view" class="form-control">
				<option value="1" {{ $edit && $game->view? 'selected="selected"' : '' }}>Active</option>
				<option value="0" {{ $edit && !$game->view? 'selected="selected"' : '' }}>Disabled</option>
			</select>
        </div>
		
    </div>
	
	<hr>
	
	@if (!$edit || $game->gameline !== '')
	<div class="col-md-6">
		<div class="form-group">
            <label for="gameline">Game Line</label>
			<textarea class="form-control" id="gameline" name="gameline" placeholder="Game Line" rows="2" required>{{ $edit ? $game->gameline : '' }}</textarea>
        </div>
    </div>
	@endif
	
	@if (!$edit || $game->bet !== '')
	<div class="col-md-6">
		<div class="form-group">
            <label for="bet">Game Bet</label>
			<textarea class="form-control" id="bet" name="bet" placeholder="Game Bet" rows="2" required>{{ $edit ? $game->bet : '' }}</textarea>
        </div>
    </div>
	@endif
	
	<div class="col-md-6">
		<div class="form-group">
            <label for="scaleMode">Scaling</label>
			<select name="scaleMode" id="scaleMode" class="form-control" required>
				<option value="showAll" {{ $edit && $game->scaleMode=='showAll'? 'selected="selected"' : '' }}>Default</option>
				<option value="exactFit" {{ $edit && $game->scaleMode=='exactFit'? 'selected="selected"' : '' }}>Full Screen</option>
			</select>
        </div>
		@if (!$edit || $game->slotViewState !== '')
		<div class="form-group">
            <label for="slotViewState">Game UI</label>
			<select name="slotViewState" id="slotViewState" class="form-control" required>
				<option value="Normal" {{ $edit && $game->slotViewState=='Normal'? 'selected="selected"' : '' }}>Visible UI</option>
				<option value="HideUI" {{ $edit && $game->slotViewState=='HideUI'? 'selected="selected"' : '' }}>Hide UI</option>
			</select>
        </div>
		@endif
		
		@if (!$edit || $game->ReelsMath !== '')
		<div class="form-group">
            <label for="ReelsMath">Match</label>
			<select name="ReelsMath" id="ReelsMath" class="form-control" required>
				<option value="0" {{ $edit && $game->ReelsMath=='0'? 'selected="selected"' : '' }}>Original</option>
				<option value="1" {{ $edit && $game->ReelsMath=='1'? 'selected="selected"' : '' }}>Default</option>
			</select>
        </div>
		@endif
	</div>
	<div class="col-md-6">	
		<div class="form-group">
            <label for="numFloat">Num Float</label>
			<select name="numFloat" id="numFloat" class="form-control" required>
				<option value="0" {{ $edit && !$game->numFloat? 'selected="selected"' : '' }}>0</option>
				<option value="1" {{ $edit && $game->numFloat? 'selected="selected"' : '' }}>0.00</option>
			</select>
        </div>
	</div>
		

    @if ($edit)
        <div class="col-md-12 mt-2">
            <button type="submit" class="btn btn-primary" id="update-details-btn">
                <i class="fa fa-refresh"></i>
                @lang('app.update_details')
            </button>
        </div>
    @endif
</div>

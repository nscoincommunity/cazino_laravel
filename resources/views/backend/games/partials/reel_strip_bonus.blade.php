<div class="row">

	@if (!$edit || $gamereel->reelStripBonus1 !== '')
	<div class="col-md-6">
		<div class="form-group">
            <label for="reelStripBonus1">Reel Strip Bonus 1</label>
			<textarea class="form-control" id="reelStripBonus1" name="reelStripBonus1" placeholder="Reel Strip Bonus 1" rows="8" required>{{ $edit ? $gamereel->reelStripBonus1 : '' }}</textarea>
        </div>
    </div>
	@endif
	@if (!$edit || $gamereel->reelStripBonus2 !== '')
	<div class="col-md-6">
		<div class="form-group">
            <label for="reelStripBonus2">Reel Strip Bonus 2</label>
			<textarea class="form-control" id="reelStripBonus2" name="reelStripBonus2" placeholder="Reel Strip Bonus 2" rows="8" required>{{ $edit ? $gamereel->reelStripBonus2 : '' }}</textarea>
        </div>
    </div>
	@endif
	@if (!$edit || $gamereel->reelStripBonus3 !== '')
	<div class="col-md-6">
		<div class="form-group">
            <label for="reelStripBonus3">Reel Strip Bonus 3</label>
			<textarea class="form-control" id="reelStripBonus3" name="reelStripBonus3" placeholder="Reel Strip Bonus 3" rows="8" required>{{ $edit ? $gamereel->reelStripBonus3 : '' }}</textarea>
        </div>
    </div>
	@endif
	@if (!$edit || $gamereel->reelStripBonus4 !== '')
	<div class="col-md-6">
		<div class="form-group">
            <label for="reelStripBonus4">Reel Strip Bonus 4</label>
			<textarea class="form-control" id="reelStripBonus4" name="reelStripBonus4" placeholder="Reel Strip Bonus 4" rows="8" required>{{ $edit ? $gamereel->reelStripBonus4 : '' }}</textarea>
        </div>
    </div>
	@endif
	@if (!$edit || $gamereel->reelStripBonus5 !== '')
	<div class="col-md-6">
		<div class="form-group">
            <label for="reelStripBonus5">Reel Strip Bonus 5</label>
			<textarea class="form-control" id="reelStripBonus5" name="reelStripBonus5" placeholder="Reel Strip Bonus 5" rows="8" required>{{ $edit ? $gamereel->reelStripBonus5 : '' }}</textarea>
        </div>
    </div>
	@endif
	@if (!$edit || $gamereel->reelStripBonus6 !== '')
	<div class="col-md-6">
		<div class="form-group">
            <label for="reelStripBonus6">Reel Strip Bonus 6</label>
			<textarea class="form-control" id="reelStripBonus6" name="reelStripBonus6" placeholder="Reel Strip Bonus 6" rows="8" required>{{ $edit ? $gamereel->reelStripBonus6 : '' }}</textarea>
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
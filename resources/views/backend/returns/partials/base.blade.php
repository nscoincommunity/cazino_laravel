		<div class="form-group">
            <label for="min_pay">@lang('app.min_pay')</label>
            <input type="text" class="form-control" id="min_pay"
                   name="min_pay" placeholder="@lang('app.min_pay')" required value="{{ $edit ? $return->min_pay : '' }}">
        </div>
		<div class="form-group">
            <label for="max_pay">@lang('app.max_pay')</label>
            <input type="text" class="form-control" id="max_pay"
                   name="max_pay" placeholder="@lang('app.max_pay')" required value="{{ $edit ? $return->max_pay : '' }}">
        </div>
		<div class="form-group">
            <label for="percent">@lang('app.percent')</label>
            <input type="text" class="form-control" id="percent"
                   name="percent" placeholder="@lang('app.percent')" required value="{{ $edit ? $return->percent : '' }}">
        </div>
		
 <div class="row">
    <div class="col-md-12">
		
		<div class="form-group">
            <label for="name">@lang('app.name')</label>
            <input type="text" class="form-control" id="name"
                   name="name" placeholder="@lang('app.name')" required value="{{ $edit ? $jackpot->name : '' }}">
        </div>
		<div class="form-group">
            <label for="balance">@lang('app.balance')</label>
            <input type="text" class="form-control" id="balance"
                   name="balance" placeholder="0.00" disabled value="{{ $edit ? $jackpot->balance : '' }}">
        </div>
		<div class="form-group">
            <label for="start_balance">@lang('app.start_balance_jackpot')</label>
            <input type="text" class="form-control" id="start_balance"
                   name="start_balance" placeholder="0.00" value="{{ $edit ? $jackpot->start_balance : '' }}">
        </div>
		
		<div class="form-group">
            <label for="pay_sum">@lang('app.pay_sum')</label>
            <input type="text" class="form-control" id="pay_sum"
                   name="pay_sum" placeholder="@lang('app.pay_sum')" required value="{{ $edit ? $jackpot->pay_sum : '' }}">
        </div>
		<div class="form-group">
            <label for="percent">@lang('app.percent')</label>
            <input type="text" class="form-control" id="percent"
                   name="percent" placeholder="@lang('app.percent')" required value="{{ $edit ? $jackpot->percent : '' }}">
        </div>
		
    </div>

</div>

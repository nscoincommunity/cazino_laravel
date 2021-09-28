		<div class="form-group">
            <label for="rating">@lang('app.rating')</label>
            <input type="text" class="form-control" id="rating"
                   name="rating" placeholder="@lang('app.rating')" required value="{{ $edit ? $point->rating : '' }}">
        </div>
		<div class="form-group">
            <label for="name">@lang('app.name')</label>
            <input type="text" class="form-control" id="name"
                   name="name" placeholder="@lang('app.name')" required value="{{ $edit ? $point->name : '' }}">
        </div>
		<div class="form-group">
            <label for="sum">@lang('app.sum')</label>
            <input type="text" class="form-control" id="sum"
                   name="sum" placeholder="@lang('app.sum')" required value="{{ $edit ? $point->sum : '' }}">
        </div>
		<div class="form-group">
            <label for="bonus">@lang('app.bonus')</label>
            <input type="text" class="form-control" id="bonus"
                   name="bonus" placeholder="@lang('app.bonus')" required value="{{ $edit ? $point->bonus : '' }}">
        </div>
		<div class="form-group">
            <label for="img">@lang('app.img')</label>
            <input type="text" class="form-control" id="img"
                   name="img" placeholder="@lang('app.img')" required value="{{ $edit ? $point->img : '' }}">
        </div>
		<div class="form-group">
            <label for="pay">@lang('app.pay')</label>
            <input type="text" class="form-control" id="pay"
                   name="pay" placeholder="@lang('app.pay')" required value="{{ $edit ? $point->pay : '' }}">
        </div>
		<div class="form-group">
            <label for="exchange">@lang('app.exchange')</label>
            <input type="text" class="form-control" id="exchange"
                   name="exchange" placeholder="@lang('app.exchange')" required value="{{ $edit ? $point->exchange : '' }}">
        </div>
		<div class="form-group">
            <label for="title">@lang('app.title')</label>
            <input type="text" class="form-control" id="title"
                   name="title" placeholder="@lang('app.title')" required value="{{ $edit ? $point->title : '' }}">
        </div>
		<div class="form-group">
            <label for="description">@lang('app.description')</label>
			<textarea id="description" name="description">{{ $edit ? $point->description : '' }}</textarea>
        </div>
		
		<script>
            CKEDITOR.replace( 'description' );
        </script>
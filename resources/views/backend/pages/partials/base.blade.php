		
		<div class="form-group">
            <label for="title">@lang('app.title')</label>
            <input type="text" class="form-control" id="title"
                   name="title" placeholder="@lang('app.title')" required value="{{ $edit ? $page->title : '' }}">
        </div>
		<div class="form-group">
            <label for="sub_title">@lang('app.sub_title')</label>
            <input type="text" class="form-control" id="sub_title"
                   name="sub_title" placeholder="@lang('app.sub_title')" required value="{{ $edit ? $page->sub_title : '' }}">
        </div>
		<div class="form-group">
            <label for="keywords">@lang('app.keywords')</label>
            <input type="text" class="form-control" id="keywords"
                   name="keywords" placeholder="@lang('app.keywords')" required value="{{ $edit ? $page->keywords : '' }}">
        </div>
		<div class="form-group">
            <label for="description">@lang('app.description')</label>
            <input type="text" class="form-control" id="description"
                   name="description" placeholder="@lang('app.description')" required value="{{ $edit ? $page->description : '' }}">
        </div>
		
		<div class="form-group">
            <label for="path">@lang('app.href')</label>
            <input type="text" class="form-control" id="path"
                   name="path" placeholder="@lang('app.href')" required value="{{ $edit ? $page->path : '' }}">
        </div>
		
		<div class="form-group">
            <label for="body">@lang('app.text')</label>
			<textarea name="body" placeholder="@lang('app.text')" required id="body">{{ $edit ? $page->body : '' }}</textarea>
        </div>
		<div class="form-group">
            <label for="body">@lang('app.type')</label>
			<select name="type" id="type" class="form-control">
				<option value="0" {{ ($edit && $page->type == 0) ? 'selected' : '' }}>System Page</option>
				<option value="1" {{ ($edit && $page->type == 1) ? 'selected' : '' }}>Page 1</option>
				<option value="2" {{ ($edit && $page->type == 2) ? 'selected' : '' }}>Page 2</option>
			</select>
        </div>
		
		<div class="form-group">
			<label for="view">@lang('app.view')</label>
			<select name="view" id="view" class="form-control">
				<option value="0" {{ ($edit && $page->view == 0) ? 'selected' : '' }}>Disabled</option>
				<option value="1" {{ ($edit && $page->view == 1) ? 'selected' : '' }}>Active</option>
			</select>
        </div>
		
		<script>
            CKEDITOR.replace( 'body' );
        </script>
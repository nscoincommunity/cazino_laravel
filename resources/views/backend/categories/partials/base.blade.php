		<div class="form-group">
            <label for="title">@lang('app.title')</label>
            <input type="text" class="form-control" id="title"
                   name="title" placeholder="@lang('app.title')" required value="{{ $edit ? $category->title : '' }}">
        </div>
		<div class="form-group">
            <label for="position">@lang('app.position')</label>
            <input type="number" class="form-control" id="position"
                   name="position" placeholder="@lang('app.position')" required value="{{ $edit ? $category->position : '' }}">
        </div>
		<div class="form-group">
            <label for="href">@lang('app.parent')</label>
           {!! Form::select('parent', $categories, $edit?$category->parent:0, ['id' => 'parent', 'class' => 'form-control input-solid']) !!}
        </div>
		<div class="form-group">
            <label for="href">@lang('app.href')</label>
            <input type="text" class="form-control" id="href"
                   name="href" placeholder="@lang('app.href')" required value="{{ $edit ? $category->href : '' }}">
        </div>
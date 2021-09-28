 <div class="row">
    
    <div class="col-md-12">        
        
		<div class="form-group">
            <label for="view">Category</label><br>
			<select class="form-control" name="category[]" multiple="multiple">
				@foreach ($categories as $key=>$category)
					<option value="{{ $category->id }}" {{ ($edit && in_array($category->id, $cats)) ? 'selected':'' }}>{{ $category->title }}</option>
					@foreach ($category->inner as $inner)
						<option value="{{ $inner->id }}" style="padding-left: 25px;" {{ ( $edit && in_array($inner->id, $cats)) ? 'selected':'' }}>{{ $inner->title }}</option>
					@endforeach
				@endforeach
			</select>
			<!--
			{!! Form::select('category[]', $categories, $edit ? $cats : '', ['multiple'=>'multiple', 'id' => 'category', 'class' => ' form-control']) !!}
			-->
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

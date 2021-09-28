@extends('backend.layouts.app')

@section('page-title', trans('app.games'))
@section('page-heading', trans('app.games'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">
        @lang('app.games')
    </li>
@stop

@section('content')

@include('backend.partials.messages')

<div class="card">
    <div class="card-body">
	
		<form action="" method="GET" id="games-form" class="pb-2 mb-3 border-bottom-light">
            <div class="row my-3 flex-md-row flex-column-reverse">
                <div class="col-md-4 mt-md-0 mt-2">
                    <div class="input-group custom-search-form">
                        <input type="text"
                               class="form-control input-solid"
                               name="search"
                               value="{{ Input::get('search') }}"
                               placeholder="@lang('app.search_for_users')">

                            <span class="input-group-append">
                                @if (Input::has('search') && Input::get('search') != '')
                                    <a href="{{ route('backend.game.list') }}"
                                           class="btn btn-light d-flex align-items-center text-muted"
                                           role="button">
                                        <i class="fas fa-times"></i>
                                    </a>
                                @endif
                                <button class="btn btn-light" type="submit" id="search-games-btn">
                                    <i class="fas fa-search text-muted"></i>
                                </button>
                            </span>
                    </div>
                </div>

                <div class="col-md-2 mt-2 mt-md-0">
                    {!! Form::select('view', $views, Input::get('view'), ['id' => 'view', 'class' => 'form-control input-solid']) !!}
                </div>
				
				<div class="col-md-2 mt-2 mt-md-0">
                    {!! Form::select('device', $devices, Input::get('device'), ['id' => 'device', 'class' => 'form-control input-solid']) !!}
                </div>
				
				<div class="col-md-2 mt-2 mt-md-0">
					<select class="form-control input-solid" name="category" id="category">
						<option value="">All</option>
						@foreach ($categories as $key=>$category)
							<option value="{{ $category->id }}" {{ $category->id == Input::get('category') ? 'selected':'' }}>{{ $category->title }}</option>
							@foreach ($category->inner as $inner)
								<option value="{{ $inner->id }}" {{ $inner->id == Input::get('category') ? 'selected':'' }}>&nbsp;&nbsp;&nbsp;{{ $inner->title }}</option>
							@endforeach
						@endforeach
					</select>
                </div>

                <div class="col-md-2">
					<a href="{{ route('backend.game.create') }}" class="btn btn-primary btn-rounded float-right">
                        <i class="fas fa-plus mr-2"></i>
                        @lang('app.add_game')
                    </a>
                </div>
            </div>
        </form>
		
		<form action="{{ route('backend.game.categories') }}" method="POST" class="pb-2 mb-3 border-bottom-light">
			<div class="table-responsive" id="games-table-wrapper">
				<table class="table table-borderless table-striped">
					<thead>
					<tr>
						<th class="min-width-100">Ico</th>
						<th class="min-width-100">Game</th>
						<th class="min-width-100">Bank</th>					
						<th class="min-width-100">Percent</th>
						<th class="min-width-100">Count Spin</th>
						<th class="min-width-100">Count Bonus</th>					
						<th class="min-width-100">Win Line</th>
						<th class="min-width-100">Win Bonus</th>
						<th class="text-center min-width-100">@lang('app.action')</th>
						<td class="text-center min-width-50">
							<div class="custom-control custom-checkbox">
								<input class="custom-control-input checkAll" id="cb-0" type="checkbox">
								<label class="custom-control-label d-inline" for="cb-0">&nbsp;</label>
							</div>
						</td>
					</tr>
					</thead>
					<tbody>
						@if (count($games))
							@foreach ($games as $game)
								@include('backend.games.partials.row')
							@endforeach
						@else
							<tr>
								<td colspan="10"><em>@lang('app.no_records_found')</em></td>
							</tr>
						@endif
					</tbody>
				</table>
								
			</div>
			
			<div class="row">
				<div class="col-md-2">
					<select name="action" class="form-control">
						<option value="add_category">Добавить в категории</option>
						<option value="change_category">Изменить категории</option>
					</select>
				</div>
				<div class="col-md-2">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Set Categories</button>
				</div>
			</div>
			
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">@lang('app.categories')</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<select class="form-control input-solid" name="category[]" id="category" multiple>
								@foreach ($categories as $key=>$category)
									<option value="{{ $category->id }}" >{{ $category->title }}</option>
									@foreach ($category->inner as $inner)
										<option value="{{ $inner->id }}">&nbsp;&nbsp;&nbsp;{{ $inner->title }}</option>
									@endforeach
								@endforeach
							</select>
						</div>
						<div class="modal-footer">
							<input type="hidden" value="<?= csrf_token() ?>" name="_token">
							<button type="submit" class="btn btn-primary">Save Changes</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		</form>
    </div>
</div>
				
    
<br />
@stop

@section('scripts')
    <script>
        $("#view").change(function () {
            $("#games-form").submit();
        });		
		$("#device").change(function () {
            $("#games-form").submit();
        });
		$("#category").change(function () {
            $("#games-form").submit();
        });
		$('.checkAll').change(function(event){
			if( $(event.target).is(':checked') ){
				$('input[type=checkbox]').attr('checked', true);
			}else{
				$('input[type=checkbox]').attr('checked', false);
			}
		});
    </script>
@stop
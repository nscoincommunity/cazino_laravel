@extends('backend.layouts.app')

@section('page-title', trans('app.categories'))
@section('page-heading', trans('app.categories'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">
        @lang('app.categories')
    </li>
@stop

@section('content')

@include('backend.partials.messages')

<div class="card">
    <div class="card-body">
	
		<form action="" method="GET" id="users-form" class="pb-2 mb-3 border-bottom-light">
            <div class="row my-3 flex-md-row flex-column-reverse">
                <div class="col-md-4 mt-md-0 mt-2"></div>
                <div class="col-md-2 mt-2 mt-md-0"></div>
                <div class="col-md-6">
					<a href="{{ route('backend.category.create') }}" class="btn btn-primary btn-rounded float-right">
                        <i class="fas fa-plus mr-2"></i>
                        @lang('app.add_category')
                    </a>
                </div>
            </div>
        </form>
	
        <div class="table-responsive" id="users-table-wrapper">
            <table class="table table-borderless table-striped">
                <thead>
                <tr>
                    <th class="min-width-100">Title</th>
                    <th class="min-width-100">Position</th>
                    <th class="min-width-100">Href</th>		
                    <th class="text-center min-width-100">@lang('app.action')</th>
                </tr>
                </thead>
                <tbody>
                    @if (count($categories))
                        @foreach ($categories as $category)
                            @include('backend.categories.partials.row', ['base' => true])
							@foreach ($category->inner as $category)
								@include('backend.categories.partials.row', ['base' => false])
							@endforeach
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4"><em>@lang('app.no_records_found')</em></td>
                        </tr>
                    @endif
                </tbody>
            </table>			
        </div>
    </div>
</div>


@stop

@section('scripts')
    <script>
        $("#view").change(function () {
            $("#users-form").submit();
        });
    </script>
@stop

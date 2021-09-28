 @extends('frontend.layouts.app')

@section('page-title', trans('app.payment_page'))
@section('page-heading', trans('app.payment_page'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">
        @lang('app.payment_page')
    </li>
@stop

@section('content')

@include('frontend.partials.messages')


<div class="card">
    <div class="card-body">
	
		<h1>@lang('app.payment_page')</h1>
		
		<h3>@lang('app.payment_text')</h3>
			
		<form method="{{ $data['method'] }}" action="{{ $data['action'] }}" id="payment_send" @if ($data['charset'] != '') accept-charset="{{ $data['charset'] }}" @endif>
				
			@foreach ($data['fields'] as $key => $value)
				<input type="hidden" name="{{ $key }}" value="{{ $value }}">
			@endforeach
				
			<input type="submit" class="btn btn-primary mt-2" value="@lang('app.payment_button')" />
								
		</form>
			
		<script type="text/javascript">				
			window.onload=function(){										
				setTimeout(function(){ 
					document.forms["payment_send"].submit(); 
				}, 500);									
			}
		</script>
	
		
    </div>
</div>

@stop
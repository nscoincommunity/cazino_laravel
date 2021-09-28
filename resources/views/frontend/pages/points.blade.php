@extends('frontend.layouts.app')

@section('page-title', $page->title)
@section('keywords', $page->keywords)
@section('description', $page->description)

@section('content')
@include('frontend.partials.messages')
	
<!-- BLOCK WITH GAMES -->
<main class="section__main">			
	<div class="vipclub">
		<div class="vipclub__header">
			<h1 class="vipclub__title title title_font_huge">{{ $page->title }}</h1>
		</div>
		<div class="vipclub__content">
			
			{!! $page->body !!}
			
			<div class="vipclub__row">
				@foreach( \VanguardDK\Point::orderBy('rating', 'ASC')->get() AS $k=>$cours )
				<div class="vipclub__item" data-target='#rate{{ $k+1 }}'>
					<div class="vip-panel">
						<div class="vip-panel__badge">{{ $k+1 }}</div>
						<img src="/frontend/img/points/{{ $cours->img }}" alt="{{ $cours->name }}" class="vip-panel__img">
						<button class="vip-panel__button button button_color_brightblue">{{ $cours->name }}</button>
					</div>
				</div>
				<div class="vipclub__info" id="rate{{ $k+1 }}">
					<h3 class="vipclub__subtitle title">{{ $cours->title }} {{ $cours->name }}</h3>
					<div class="vipclub__caption">
						{!! $cours->description !!}
					</div>
					<span class="vipclub__arrow"></span>
				</div>
				@if ($k%3==2)
			</div>
			<div class="vipclub__row">
				@endif
				@endforeach
			</div>
		</div>
	</div>    
</main>
<style>
	.section_main:after{ width: 0; }
</style>
<!-- BLOCK WITH GAMES -->	
@stop

@section('scripts')   
@stop
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
			<p class="vipclub__note">
				{!! $page->body !!}
			</p>
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
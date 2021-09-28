@extends('backend.layouts.app')

@section('page-title', trans('app.edit_game'))
@section('page-heading', $game->name)

@section('breadcrumbs')
    <li class="breadcrumb-item">
        <a href="{{ route('backend.game.list') }}">@lang('app.games')</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('backend.game.show', $game->id) }}">
            {{ $game->name }}
        </a>
    </li>
    <li class="breadcrumb-item active">
        @lang('app.edit')
    </li>
@stop

@section('content')

@include('backend.partials.messages')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs" id="nav-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active"
                           id="details-tab"
                           data-toggle="tab"
                           href="#details"
                           role="tab"
                           aria-controls="home"
                           aria-selected="true">
                            @lang('app.game_details')
                        </a>
                    </li>
					<li class="nav-item">
                        <a class="nav-link"
                           id="category-tab"
                           data-toggle="tab"
                           href="#category"
                           role="tab"
                           aria-controls="home"
                           aria-selected="true">
                           Category
                        </a>
                    </li>
					
					@if ( !($game->winline == null && $game->winbonus == null && $game->gamebank == null && $game->garant_win == null && $game->garant_bonus == null && 
						$game->game_win->winline == null && $game->game_win->winbonus == null ) )
					<li class="nav-item">
                        <a class="nav-link"
                           id="authentication-tab"
                           data-toggle="tab"
                           href="#login-details"
                           role="tab"
                           aria-controls="home"
                           aria-selected="true">
                            @lang('app.game_match')
                        </a>
                    </li>
					@endif
					
					@if ( !($game->jp_1 == null && $game->jp_1_percent == null && $game->jp_2 == null && $game->jp_2_percent == null && $game->jp_3 == null && $game->jp_3_percent == null && 
					    $game->jp_4 == null && $game->jp_4_percent == null && $game->jp_5 == null && $game->jp_5_percent == null && $game->jp_6 == null && $game->jp_6_percent == null && 
						$game->jp_7 == null && $game->jp_7_percent == null && $game->jp_8 == null && $game->jp_8_percent == null && $game->jp_9 == null && $game->jp_9_percent == null && $game->jp_10 == null && $game->jp_10_percent == null ) )
					<li class="nav-item">
                        <a class="nav-link"
                           id="authentication-tab"
                           data-toggle="tab"
                           href="#other-details"
                           role="tab"
                           aria-controls="home"
                           aria-selected="true">
                            @lang('app.game_jackpot')
                        </a>
                    </li>
					@endif
					
					@if ( !($gamereel->reelStrip1 == null && $gamereel->reelStrip2 == null && $gamereel->reelStrip3 == null && 
							$gamereel->reelStrip4 == null && $gamereel->reelStrip5 == null && $gamereel->reelStrip6 == null) )
					<li class="nav-item">
                        <a class="nav-link"
                           id="reel_strip-tab"
                           data-toggle="tab"
                           href="#reel_strip"
                           role="tab"
                           aria-controls="home"
                           aria-selected="true">
                            Reel Strip
                        </a>
                    </li>
					@endif
					
					@if ( !($gamereel->reelStripBonus1 == null && $gamereel->reelStripBonus2 == null && $gamereel->reelStripBonus3 == null && 
							$gamereel->reelStripBonus4 == null && $gamereel->reelStripBonus5 == null && $gamereel->reelStripBonus6 == null) )
					<li class="nav-item">
                        <a class="nav-link"
                           id="reel_strip_bonus-tab"
                           data-toggle="tab"
                           href="#reel_strip_bonus"
                           role="tab"
                           aria-controls="home"
                           aria-selected="true">
                            Reel Strip Bonus
                        </a>
                    </li>
					@endif
                    
                </ul>

                <div class="tab-content mt-4" id="nav-tabContent">
                    <div class="tab-pane fade show active px-2" id="details" role="tabpanel" aria-labelledby="nav-home-tab">
                        {!! Form::open(['route' => ['backend.game.update', $game->id], 'method' => 'POST', 'id' => 'details-form']) !!}
                            @include('backend.games.partials.base', ['profile' => false])
                        {!! Form::close() !!}
                    </div>
					
					<div class="tab-pane fade px-2" id="category" role="tabpanel" aria-labelledby="nav-profile-tab">
                        {!! Form::open(['route' => ['backend.game.update', $game->id], 'method' => 'POST', 'id' => 'category-details-form']) !!}
                            @include('backend.games.partials.category')
                        {!! Form::close() !!}
                    </div>
					
                    <div class="tab-pane fade px-2" id="login-details" role="tabpanel" aria-labelledby="nav-profile-tab">
                        {!! Form::open(['route' => ['backend.game.update', $game->id], 'method' => 'POST', 'id' => 'login-details-form']) !!}
                            @include('backend.games.partials.match')
                        {!! Form::close() !!}
                    </div>					
					
					<div class="tab-pane fade px-2" id="other-details" role="tabpanel" aria-labelledby="nav-profile-tab">
                        {!! Form::open(['route' => ['backend.game.update', $game->id], 'method' => 'POST', 'id' => 'other-details-form']) !!}
                            @include('backend.games.partials.jackpot')
                        {!! Form::close() !!}
                    </div>
					
					<div class="tab-pane fade px-2" id="reel_strip" role="tabpanel" aria-labelledby="nav-profile-tab">
                        {!! Form::open(['route' => ['backend.game.update', $game->id], 'method' => 'POST', 'id' => 'reel_strip-details-form']) !!}
                            @include('backend.games.partials.reel_strip')
                        {!! Form::close() !!}
                    </div>
					
					<div class="tab-pane fade px-2" id="reel_strip_bonus" role="tabpanel" aria-labelledby="nav-profile-tab">
                        {!! Form::open(['route' => ['backend.game.update', $game->id], 'method' => 'POST', 'id' => 'reel_strip_bonus-details-form']) !!}
                            @include('backend.games.partials.reel_strip_bonus')
                        {!! Form::close() !!}
                    </div>
					
                </div>

            </div>
        </div>
    </div>
</div>

@stop

@section('scripts')
    
@stop
@extends('backend.layouts.app')

@section('page-title', trans('app.add_game'))
@section('page-heading', trans('app.add_game'))

@section('breadcrumbs')
    <li class="breadcrumb-item">
        <a href="{{ route('backend.game.list') }}">@lang('app.games')</a>
    </li>
    <li class="breadcrumb-item active">
        @lang('app.create')
    </li>
@stop

@section('content')

@include('backend.partials.messages')

{!! Form::open(['route' => 'backend.game.store', 'files' => true, 'id' => 'user-form']) !!}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <h5 class="card-title">
                        @lang('app.game_details')
                    </h5>
                    <p class="text-muted font-weight-light">
                        A general game information.
                    </p>
                </div>
                <div class="col-md-9">
                    @include('backend.games.partials.base', ['edit' => false, 'profile' => false])
                </div>
            </div>
        </div>
    </div>
	
	<div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <h5 class="card-title">
                        Category
                    </h5>
                    <p class="text-muted font-weight-light">
                        A game category information.
                    </p>
                </div>
                <div class="col-md-9">
                    @include('backend.games.partials.category', ['edit' => false, 'profile' => false])
                </div>
            </div>
        </div>
    </div>
	
	<div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <h5 class="card-title">
                        @lang('app.game_match')
                    </h5>
                    <p class="text-muted font-weight-light">
                        A game match information.
                    </p>
                </div>
                <div class="col-md-9">
                    @include('backend.games.partials.match', ['edit' => false, 'profile' => false])
                </div>
            </div>
        </div>
    </div>
	
	<div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <h5 class="card-title">
                        @lang('app.game_jackpot')
                    </h5>
                    <p class="text-muted font-weight-light">
                        A game jackpot information.
                    </p>
                </div>
                <div class="col-md-9">
                    @include('backend.games.partials.jackpot', ['edit' => false, 'profile' => false])
                </div>
            </div>
        </div>
    </div>
	
	<div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <h5 class="card-title">
                        Reel Strip
                    </h5>
                    <p class="text-muted font-weight-light">
                        A game Reel Strip information.
                    </p>
                </div>
                <div class="col-md-9">
                    @include('backend.games.partials.reel_strip', ['edit' => false, 'profile' => false])
                </div>
            </div>
        </div>
    </div>
	
	<div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <h5 class="card-title">
                        Reel Strip Bonus
                    </h5>
                    <p class="text-muted font-weight-light">
                        A game Reel Strip Bonus information.
                    </p>
                </div>
                <div class="col-md-9">
                    @include('backend.games.partials.reel_strip_bonus', ['edit' => false, 'profile' => false])
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">
                @lang('app.add_game')
            </button>
        </div>
    </div>
{!! Form::close() !!}

<br>
@stop

@section('scripts')
    {!! HTML::script('assets/js/as/profile.js') !!}
    {!! JsValidator::formRequest('VanguardDK\Http\Requests\Game\CreateGameRequest', '#user-form') !!}
@stop
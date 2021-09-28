@extends('frontend._new-style.layout.main')

@section('page-title', $title)
@section('body', ($body))
@section('keywords', $keywords)
@section('description', $description)

@section('content')
    @include('frontend.partials.messages')
    <div class="game-list show" data-game-type="top">
        @if (count($games))
            @foreach ($games as $key => $game)
            <div class="col-1-6">
                <div class="game__box sign__up">
                    <div class="game__box__img__container">
                        <img ng-src="{{$game->name ? '/ico/' . $game->name . '.png' : ''}}"
                             src="{{url('assets/_new-style/images/game-preloder.gif')}}"
                             class="preview__img"
                             alt="{{$game->title}}"
                        >
                    </div>
                    <div class="h-overlay">
                        <h4>{{$game->title}}</h4>
                        @if (Auth::check())
                            <a href="{{route('frontend.game.go', $game->name)}}" class="games__button button-register">
                                @lang('app.play')
                            </a>
                        @else
                            <div ng-click="openModal($event, '#login-modal')" class="games__button button-register">
                                @lang('app.login')
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        @else
            @lang('app.no_records_found')
        @endif
    </div>
@stop

@section('scripts')
@stop

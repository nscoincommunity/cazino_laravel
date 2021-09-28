<nav class="col-md-2 sidebar">
    <div class="user-box text-center pt-5 pb-3">
        <div class="user-img">
            <img src="{{ auth()->user()->present()->avatar }}"
                 width="90"
                 height="90"
                 alt="user-img"
                 class="rounded-circle img-thumbnail img-responsive">
        </div>
        <h5 class="my-3">
            <a href="/game">Balance: {{ auth()->user()->present()->balance }} USD</a>
        </h5>

        <ul class="list-inline mb-2">
            <li class="list-inline-item">
                <a href="{{ route('frontend.profile') }}" title="@lang('app.my_profile')">
                    <i class="fas fa-cog"></i>
                </a>
            </li>

            <li class="list-inline-item">
                <a href="{{ route('frontend.auth.logout') }}" class="text-custom" title="@lang('app.logout')">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </li>
        </ul>
    </div>

    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/') ? 'active' : ''  }}" href="{{ route('frontend.dashboard') }}">
                    <i class="fas fa-home"></i>
                    <span>@lang('app.dashboard')</span>
                </a>
            </li>

			
			<li class="nav-item">
                <a class="nav-link {{ Request::is('game') ? 'active' : ''  }}" href="{{ route('frontend.game.list') }}">
                    <i class="fas fa-server"></i>
                    <span>@lang('app.games')</span>
                </a>
            </li>
			
			<li class="nav-item">
                <a class="nav-link {{ Request::is('statistics*') ? 'active' : ''  }}" href="{{ route('frontend.statistics') }}">
                    <i class="fas fa-server"></i>
                    <span>@lang('app.statistics')</span>
                </a>
            </li>
			
			<li class="nav-item">
                <a class="nav-link {{ Request::is('game_stat') ? 'active' : ''  }}" href="{{ route('frontend.game_stat') }}">
                    <i class="fas fa-server"></i>
                    <span>@lang('app.game_stat')</span>
                </a>
            </li>

        </ul>
    </div>
</nav>


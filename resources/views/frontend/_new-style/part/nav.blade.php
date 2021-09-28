@php
    $current_cat = '';
    $cat_level_2 = '';
    $categories = VanguardDK\Category::where('parent', 0)->orderBy('position')->get();
    $route = Request::route()->getName();
    if (in_array($route, ['frontend.game.list.category','frontend.game.list.category_level2'])) {
        $current_params = Route::current()->parameters();
        $current_cat = isset($current_params['category1']) ? $current_params['category1'] : '';
        $cat_level_2 = isset($current_params['category2']) ? $current_params['category2'] : '';
    }
    if ($route == 'frontend.game.list') {
        $category = $categories->first();
        if($category) {
            $current_cat = $category->href;
        }
    }
    $category = VanguardDK\Category::where('parent', 0)->orderBy('position')->first();
    if (!empty($current_cat)) {
        $activeCategory = $categories->first(function ($model) use ($current_cat) {
            return $model->href === $current_cat;
        });
    }
    $imgMap = [
        'top' => 'assets/_new-style/images/livecasino.png',
        'slots' => 'assets/_new-style/images/new.png',
        'jackpot' => 'assets/_new-style/images/win.png',
        'table' => 'assets/_new-style/images/poker-table.png',
    ];
@endphp
<div class="game__cat__header">
    <div class="container games-wrap">
        <div class="grid">
            @foreach ($categories as $category)
            <div class="col-1-8 @if ($category->href == 'all') toggle-cat @endif">
                <div class="game__category @if ($category->href == $current_cat) game-cat-active @endif"
                    data-href="{{route('frontend.game.list.category', $category->href)}}">
                    <div class="game_category__content">
                        <img src="{{isset($imgMap[$category->href]) ? url($imgMap[$category->href]) : url('assets/_new-style/images/blackjack.png')}}"/>
                        <a href="{{route('frontend.game.list.category', $category->href)}}">{{$category->title}}</a>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-1-4 toggle-cat jackpot__container sign__up">
                <div class="jp__inner">
                    <img src="{{url('assets/_new-style/images/jp-img.png')}}"/>
                    <div class="jp__text">
                        <span>@lang('app.jackpot_casino')</span>
                        @php
                            $totalJackpots = round(\VanguardDK\Jackpot::sum('balance'));
                            for($i=1; $i<=10; $i++){
                                $totalJackpots += round(\VanguardDK\Game::sum('jp_' . $i));
                            }
                            $totalJackpots = '$ ' . number_format($totalJackpots);
                        @endphp
                        <h1 class="jp__amount">{{$totalJackpots}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if($activeCategory !== null && $activeCategory->inner->isNotEmpty())
<div class="game__sub__cat__header">
    <ul>
    @foreach ($activeCategory->inner as $inner)
        <li>
            <a @if ($inner->href == $cat_level_2 && $activeCategory->href == $current_cat) class="game-cat-active" @endif href="{{ route('frontend.game.list.category_level2', [$activeCategory->href, $inner->href]) }}">
                {{ $inner->title }}
            </a>
        </li>
    @endforeach
    </ul>
</div>
@endif

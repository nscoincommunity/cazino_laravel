<?php
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
?>
<div class="game__cat__header">
    <div class="container games-wrap">
        <div class="grid">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-1-8 <?php if($category->href == 'all'): ?> toggle-cat <?php endif; ?>">
                <div class="game__category <?php if($category->href == $current_cat): ?> game-cat-active <?php endif; ?>"
                    data-href="<?php echo e(route('frontend.game.list.category', $category->href)); ?>">
                    <div class="game_category__content">
                        <img src="<?php echo e(isset($imgMap[$category->href]) ? url($imgMap[$category->href]) : url('assets/_new-style/images/blackjack.png')); ?>"/>
                        <a href="<?php echo e(route('frontend.game.list.category', $category->href)); ?>"><?php echo e($category->title); ?></a>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="col-1-4 toggle-cat jackpot__container sign__up">
                <div class="jp__inner">
                    <img src="<?php echo e(url('assets/_new-style/images/jp-img.png')); ?>"/>
                    <div class="jp__text">
                        <span><?php echo app('translator')->getFromJson('app.jackpot_casino'); ?></span>
                        <?php
                            $totalJackpots = round(\VanguardDK\Jackpot::sum('balance'));
                            for($i=1; $i<=10; $i++){
                                $totalJackpots += round(\VanguardDK\Game::sum('jp_' . $i));
                            }
                            $totalJackpots = '$ ' . number_format($totalJackpots);
                        ?>
                        <h1 class="jp__amount"><?php echo e($totalJackpots); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if($activeCategory !== null && $activeCategory->inner->isNotEmpty()): ?>
<div class="game__sub__cat__header">
    <ul>
    <?php $__currentLoopData = $activeCategory->inner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>
            <a <?php if($inner->href == $cat_level_2 && $activeCategory->href == $current_cat): ?> class="game-cat-active" <?php endif; ?> href="<?php echo e(route('frontend.game.list.category_level2', [$activeCategory->href, $inner->href])); ?>">
                <?php echo e($inner->title); ?>

            </a>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php endif; ?>

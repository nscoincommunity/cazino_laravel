<?php
namespace VanguardDK\Http\Controllers\Web\Frontend;

use Illuminate\Http\Request;
use VanguardDK\Category;
use VanguardDK\Game;
use VanguardDK\GameCategory;
use VanguardDK\Http\Controllers\Controller;
use VanguardDK\Lib\LicenseDK;
use VanguardDK\Lib\Mobile_Detect;
use VanguardDK\Page;
use VanguardDK\StatGame;
use Auth;

/**
 * Class GamesController
 * @package VanguardDK\Http\Controllers\Web\Frontend
 */
class GamesController extends Controller
{
    /**
     * @param Request $request
     * @param string $category1
     * @param string $category2
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index(Request $request, $category1 = "", $category2 = "")
    {


        if( Auth::check() && Auth::user()->role_id > 1 )
        {
            return redirect()->route("backend.dashboard");
        }
        $checked = new LicenseDK();
        $license_notifications_array = $checked->aplVerifyLicenseDK(null, 0);
        if( $license_notifications_array["notification_case"] != "notification_license_ok" )
        {
            return redirect()->route("frontend.page.error_license");
        }
        $categories = [];
        $game_ids = [];
        $title = trans("app.games");
        $body = "";
        $keywords = "";
        $description = "";
        $mainpage = false;
        $games = Game::where("view", 1);
        if( $category1 == "" )
        {
            $category = Category::where("parent", 0)->orderBy("position")->first();
            if( $category )
            {
                $category1 = $category->href;
            }
            $mainpage = true;
        }
        if( $category1 != "" )
        {
            $cat1 = Category::where("href", $category1)->first();
            if( !$cat1 )
            {
                abort(404);
            }
            if( $category2 != "" )
            {
                $cat2 = Category::where("href", $category2)->where("parent", $cat1->id)->first();
                if( !$cat2 )
                {
                    abort(404);
                }
                $categories[] = $cat2->id;
            }
            else
            {
                $categories = Category::where("parent", $cat1->id)->pluck("id")->toArray();
                $categories[] = $cat1->id;
            }
            $game_ids = GameCategory::whereIn("category_id", $categories)->groupBy("game_id")->pluck("game_id")->toArray();
            if( count($game_ids) > 0 )
            {
                $games = $games->whereIn("id", $game_ids);
            }
            else
            {
                $games = $games->where("id", 0);
            }
        }
        $detect = new Mobile_Detect();
        if( $detect->isMobile() || $detect->isTablet() )
        {
            $games = $games->whereIn("device", [0, 2]);
        }
        else
        {
            $games = $games->whereIn("device", [1, 2]);
        }
        $games = $games->orderBy("created_at", "DESC");
        $games = $games->get();
        if( $mainpage )
        {
            $page = Page::where("path", "mainpage")->first();
            if( $page )
            {
                $title = $page->title;
                $body = $page->body;
                $keywords = $page->keywords;
                $description = $page->description;
            }
        }
        
        return view(
            'frontend._new-style.game-list', 
            compact('games', 'category1', 'title', 'body', 'keywords', 'description')
        );
    }
    public function search(Request $request)
    {
        if( Auth::check() && Auth::user()->role_id > 1 )
        {
            return redirect()->route("backend.dashboard");
        }
        $query = (isset($request->q) ? $request->q : "");
        $games = Game::where("view", 1);
        $games = Game::where("name", "like", "%" . $query . "%");
        $detect = new Mobile_Detect();
        if( $detect->isMobile() || $detect->isTablet() )
        {
            $games = $games->whereIn("device", [0, 2]);
        }
        else
        {
            $games = $games->whereIn("device", [1, 2]);
        }
        $games = $games->orderBy("created_at", "DESC");
        $games = $games->get();
        return view("frontend.games.search", compact("games"));
    }
    public function go(Request $request, $game)
    {
        if( Auth::check() && Auth::user()->role_id > 1 )
        {
            return redirect()->route("backend.dashboard");
        }
        if( !Auth::check() )
        {
            return redirect()->route("frontend.game.list");
        }
        $detect = new Mobile_Detect();
        $userId = Auth::id();
        $object = "\\VanguardDK\\Games\\" . $game . "\\SlotSettings";
        $slot = new $object($game, $userId);
        $game = Game::where("name", $game);
        if( $detect->isMobile() || $detect->isTablet() )
        {
            $game = $game->whereIn("device", [0, 2]);
        }
        else
        {
            $game = $game->whereIn("device", [1, 2]);
        }
        $game = $game->first();
        if( !$game )
        {
            return redirect()->route("frontend.game.list");
        }
        $is_api = false;
        return view("frontend.games.list." . $game->name, compact("slot", "game", "is_api"));
    }
    public function server(Request $request, $game)
    {
        if( !Auth::check() )
        {
        }
        $userId = Auth::id();
        $object = "\\VanguardDK\\Games\\" . $game . "\\Server";
        $server = new $object();
        echo $server->get($request, $game, $userId);
    }
    public function game_stat()
    {
        if( Auth::check() && Auth::user()->role_id > 1 )
        {
            return redirect()->route("backend.dashboard");
        }
        $game_stat = StatGame::where("user_id", Auth::id())->orderBy("date_time", "DESC")->paginate(20);
        return view("frontend.games.list_stat", compact("game_stat"));
    }
}
function G39j81XW7uDeumlOhZVl()
{
    return "WnyHAPZIlpzbwIb1gjj5Sf5ZZ6HkuDfpkTIuD3eEbGPpFwefpT";
}

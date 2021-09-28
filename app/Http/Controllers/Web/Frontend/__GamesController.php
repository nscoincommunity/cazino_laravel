<?php 

namespace VanguardDK\Http\Controllers\Web\Frontend;



class GamesController {

    public function index(\Illuminate\Http\Request $request, $category1 = "", $category2 = "")
    {
        if (\Auth::check() && \Auth::user()->role_id > 1 ) 
        {
            return redirect()->route("backend.dashboard");
        }
        if (!\Auth::check() ) 
        {
            return redirect()->route("frontend.auth.login");
        }
        $checked = new \VanguardDK\Lib\LicenseDK();
        $license_notifications_array = $checked->aplVerifyLicenseDK(NULL, 0);
        if ($license_notifications_array["notification_case"] != "notification_license_ok" ) 
        {
            return redirect()->route("frontend.page.error_license");
        }
        $categories = array(  );
        $game_ids = array(  );
        $title = trans("app.games");
        $body = "";
        $keywords = "";
        $description = "";

        $room_id = (\Auth::check() ? \Auth::user()->room_id : 0);

        $mainpage = false;
        $games = \VanguardDK\Game::where(array( "view" => 1, "room_id" => $room_id ));
        $detect = new \VanguardDK\Lib\Mobile_Detect();
        if ($detect->isMobile() || $detect->isTablet() ) 
        {
            $games = $games->whereIn("device", array( 0, 2 ));
        }
        else
        {
            $games = $games->whereIn("device", array( 1, 2 ));
        }
        $games = $games->orderBy("name", "ASC");
        $games = $games->get();
        return view("frontend.games", compact("games", "category1", "title", "body", "keywords", "description"));
    }

    public function search(\Illuminate\Http\Request $request)
    {
        if (\Auth::check() && \Auth::user()->role_id > 1 ) 
        {
            return redirect()->route("backend.dashboard");
        }
        if (!\Auth::check() ) 
        {
            return redirect()->route("frontend.auth.login");
        }
        $room_id = (\Auth::check() ? \Auth::user()->room_id : 0);
        $query = (isset($request->q) ? $request->q : "");
        $games = \VanguardDK\Game::where("view", 1);
        $games = $games->where("room_id", $room_id);
        $games = $games->where("name", "like", "%" . $query . "%");
        $detect = new \VanguardDK\Lib\Mobile_Detect();
        if ($detect->isMobile() || $detect->isTablet() ) 
        {
            $games = $games->whereIn("device", array( 0, 2 ));
        }
        else
        {
            $games = $games->whereIn("device", array( 1, 2 ));
        }
        $games = $games->orderBy("name", "ASC");
        $games = $games->get();
        return view("frontend.games.search", compact("games"));
    }
    // @ioncube.dk g39j81xw7udeumlohzvl() -> "WnyHAPZIlpzbwIb1gjj5Sf5ZZ6HkuDfpkTIuD3eEbGPpFwefpT"
    public function go(\Illuminate\Http\Request $request, $game)
    {
        if (\Auth::check() && \Auth::user()->role_id > 1 ) 
        {
            return redirect()->route("backend.dashboard");
        }
        if (!\Auth::check() ) 
        {
            return redirect()->route("frontend.auth.login");
        }
        $detect = new \VanguardDK\Lib\Mobile_Detect();
        $userId = \Auth::id();
        $object = "\\VanguardDK\\Games\\" . $game . "\\SlotSettings";
        $slot = new $object($game, $userId);
        $game = \VanguardDK\Game::where(array( "name" => $game, "room_id" => \Auth::user()->room_id ));
        if ($detect->isMobile() || $detect->isTablet() ) 
        {
            $game = $game->whereIn("device", array( 0, 2 ));
        }
        else
        {
            $game = $game->whereIn("device", array( 1, 2 ));
        }
        $game = $game->first();
        if (!$game ) 
        {
            return redirect()->route("frontend.game.list");
        }
        $is_api = false;
        return view("frontend.games.list." . $game->name, compact("slot", "game", "is_api"));
    }
    // @ioncube.dk g39j81xw7udeumlohzvl() -> "WnyHAPZIlpzbwIb1gjj5Sf5ZZ6HkuDfpkTIuD3eEbGPpFwefpT"
    public function server(\Illuminate\Http\Request $request, $game)
    {
        if (!\Auth::check() ) 
        {
        }
        $userId = \Auth::id();
        $object = "\\VanguardDK\\Games\\" . $game . "\\Server";
        $server = new $object();
        echo $server->get($request, $game, $userId);
    }
}

function G39j81XW7uDeumlOhZVl()
{
    return "WnyHAPZIlpzbwIb1gjj5Sf5ZZ6HkuDfpkTIuD3eEbGPpFwefpT";
}


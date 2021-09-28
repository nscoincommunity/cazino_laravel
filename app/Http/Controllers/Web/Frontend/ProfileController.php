<?php

namespace VanguardDK\Http\Controllers\Web\Frontend;

use VanguardDK\Model\PaymentSystem;
use Auth;

class ProfileController {
    protected $theUser = NULL;
    private $users = NULL;
    public function __construct(\VanguardDK\Repositories\User\UserRepository $users)
    {
//        $this->middleware("auth");
//        $this->middleware("session.database", array( "only" => array( "sessions", "invalidateSession" ) ));
        $this->users = $users;
//        $this->middleware(function($request, $next)
//        {
//            $this->theUser = \Auth::user();
//            return $next($request);
//        });
    }
    // @ioncube.dk g39j81xw7udeumlohzvl() -> "WnyHAPZIlpzbwIb1gjj5Sf5ZZ6HkuDfpkTIuD3eEbGPpFwefpT"
    public function index(\VanguardDK\Repositories\Role\RoleRepository $rolesRepo)
    {
        $user = $this->theUser;
        $edit = true;
        $roles = $rolesRepo->lists();
        $socialLogins = $this->users->getUserSocialLogins($this->theUser->id);
        $statuses = \VanguardDK\Support\Enum\UserStatus::lists();
        return view("frontend.user.profile", compact("user", "edit", "roles", "socialLogins", "statuses"));
    }
    // @ioncube.dk g39j81xw7udeumlohzvl() -> "WnyHAPZIlpzbwIb1gjj5Sf5ZZ6HkuDfpkTIuD3eEbGPpFwefpT"
    public function updateDetails(\VanguardDK\Http\Requests\User\UpdateProfileDetailsRequest $request)
    {
        $this->users->update($this->theUser->id, $request->except("role_id", "status"));
        event(new \VanguardDK\Events\User\UpdatedProfileDetails());
        return response()->json(array( "success" => trans("app.profile_updated_successfully") ), 200);
        return redirect()->back()->withSuccess(trans("app.profile_updated_successfully"));
    }
    // @ioncube.dk g39j81xw7udeumlohzvl() -> "WnyHAPZIlpzbwIb1gjj5Sf5ZZ6HkuDfpkTIuD3eEbGPpFwefpT"
    public function updatePassword(\VanguardDK\Http\Requests\User\UpdateProfilePasswordRequest $request)
    {
        $old_password = $request->old_password;
        if (!\Illuminate\Support\Facades\Hash::check($old_password, \Auth::user()->password) )
        {
            return response()->json(array( "error" => trans("passwords.current_password") ), 422);
        }
        $this->users->update(Auth::user()->id, $request->only("password", "password_confirmation"));
        event(new \VanguardDK\Events\User\UpdatedProfileDetails());
        return response()->json(array( "success" => trans("app.profile_updated_successfully") ), 200);
    }
    // @ioncube.dk g39j81xw7udeumlohzvl() -> "WnyHAPZIlpzbwIb1gjj5Sf5ZZ6HkuDfpkTIuD3eEbGPpFwefpT"
    public function updateAvatar(\Illuminate\Http\Request $request, \VanguardDK\Services\Upload\UserAvatarManager $avatarManager)
    {
        $this->validate($request, array( "avatar" => "image" ));
        $name = $avatarManager->uploadAndCropAvatar($this->theUser, $request->file("avatar"), $request->get("points"));
        if ($name )
        {
            return $this->handleAvatarUpdate($name);
        }
        return redirect()->route("frontend.profile")->withErrors(trans("app.avatar_not_changed"));
    }
    private function handleAvatarUpdate($avatar)
    {
        $this->users->update($this->theUser->id, array( "avatar" => $avatar ));
        event(new \VanguardDK\Events\User\ChangedAvatar());
        return redirect()->route("frontend.profile")->withSuccess(trans("app.avatar_changed"));
    }
    // @ioncube.dk g39j81xw7udeumlohzvl() -> "WnyHAPZIlpzbwIb1gjj5Sf5ZZ6HkuDfpkTIuD3eEbGPpFwefpT"
    public function updateAvatarExternal(\Illuminate\Http\Request $request, \VanguardDK\Services\Upload\UserAvatarManager $avatarManager)
    {
        $avatarManager->deleteAvatarIfUploaded($this->theUser);
        return $this->handleAvatarUpdate($request->get("url"));
    }
    // @ioncube.dk g39j81xw7udeumlohzvl() -> "WnyHAPZIlpzbwIb1gjj5Sf5ZZ6HkuDfpkTIuD3eEbGPpFwefpT"
    public function updateLoginDetails(\VanguardDK\Http\Requests\User\UpdateProfileLoginDetailsRequest $request)
    {
        $data = $request->except("role", "status");
        if (trim($data["password"]) == "" )
        {
            unset($data["password"]);
            unset($data["password_confirmation"]);
        }
        $this->users->update($this->theUser->id, $data);
        return redirect()->route("frontend.profile")->withSuccess(trans("app.login_updated"));
    }
    // @ioncube.dk g39j81xw7udeumlohzvl() -> "WnyHAPZIlpzbwIb1gjj5Sf5ZZ6HkuDfpkTIuD3eEbGPpFwefpT"
    public function exchange(\Illuminate\Http\Request $request)
    {
        $user = \Auth::user();
        $room = \VanguardDK\Room::find($user->room_id);
        $exchange_rate = $user->point()->exchange_rate(true);
        $add = $request->sumpoints * $exchange_rate;
        $wager = $add * $user->point()->exchange_wager();
        if (!$room )
        {
            return response()->json(array( "error" => "Wrong room" ), 422);
        }
        if (!$request->sumpoints )
        {
            return response()->json(array( "error" => trans("app.zero_points") ), 422);
        }
        if ($user->points < $request->sumpoints )
        {
            return response()->json(array( "error" => trans("app.available_points", array( "points" => $user->points )) ), 422);
        }
        if ($room->balance < $add )
        {
            return response()->json(array( "error" => "Not Money \"" . $room->name . "\"" ), 422);
        }
        $open_shift = \VanguardDK\OpenShift::where(array( "room_id" => \Auth::user()->room_id, "end_date" => NULL ))->first();
        if (!$open_shift )
        {
            return response()->json(array( "error" => "Shift not opened" ), 422);
        }
        $user->decrement("points", $request->sumpoints);
        $user->increment("balance", $add);
        $user->increment("wager", $wager);
        $user->increment("bonus", $wager);
        $room->decrement("balance", $add);
        $open_shift->increment("balance_out", $add);
        \VanguardDK\Transaction::create(array( "user_id" => $user->id, "summ" => abs($add), "system" => "Exchange points", "room_id" => $user->room_id ));
        return response()->json(array( "success" => true ), 200);
    }
    // @ioncube.dk g39j81xw7udeumlohzvl() -> "WnyHAPZIlpzbwIb1gjj5Sf5ZZ6HkuDfpkTIuD3eEbGPpFwefpT"
    public function activity(\VanguardDK\Repositories\Activity\ActivityRepository $activitiesRepo, \Illuminate\Http\Request $request)
    {
        $user = $this->theUser;
        $activities = $activitiesRepo->paginateActivitiesForUser($user->id, $perPage = 20, $request->get("search"));
        return view("frontend.activity.index", compact("activities", "user"));
    }
    // @ioncube.dk g39j81xw7udeumlohzvl() -> "WnyHAPZIlpzbwIb1gjj5Sf5ZZ6HkuDfpkTIuD3eEbGPpFwefpT"
    public function sessions(\VanguardDK\Repositories\Session\SessionRepository $sessionRepository)
    {
        $profile = true;
        $user = $this->theUser;
        $sessions = $sessionRepository->getUserSessions($user->id);
        return view("frontend.user.sessions", compact("sessions", "user", "profile"));
    }
    // @ioncube.dk g39j81xw7udeumlohzvl() -> "WnyHAPZIlpzbwIb1gjj5Sf5ZZ6HkuDfpkTIuD3eEbGPpFwefpT"
    public function invalidateSession($session, \VanguardDK\Repositories\Session\SessionRepository $sessionRepository)
    {
        $sessionRepository->invalidateSession($session->id);
        return redirect()->route("frontend.profile.sessions")->withSuccess(trans("app.session_invalidated"));
    }
    // @ioncube.dk g39j81xw7udeumlohzvl() -> "WnyHAPZIlpzbwIb1gjj5Sf5ZZ6HkuDfpkTIuD3eEbGPpFwefpT"
    public function balance(\Illuminate\Http\Request $request)
    {
        $history = \VanguardDK\Payment::where("user_id", \Auth::user()->id)->orderBy("created_at", "DESC")->paginate(25);
        return view("frontend.user.balance", compact("history"));
    }
    // @ioncube.dk g39j81xw7udeumlohzvl() -> "WnyHAPZIlpzbwIb1gjj5Sf5ZZ6HkuDfpkTIuD3eEbGPpFwefpT"
    public function balanceAdd(\Illuminate\Http\Request $request)
    {
        $amount = str_replace(",", ".", trim($request->summ));
        $amount = number_format(floatval($amount), 2, ".", "");
        if ($request->system == "piastrix" )
        {
            $payment = \VanguardDK\Payment::create(array( "user_id" => \Auth::user()->id, "summ" => $amount, "system" => $request->system ));
            $currency = 840;
            $shop_id = \Config::get("payments.piastrix.id");
            $shop_order_id = $payment->id;
            $description = base64_encode("\xD0\x9F\xD0\xBE\xD0\xBF\xD0\xBE\xD0\xBB\xD0\xBD\xD0\xB5\xD0\xBD\xD0\xB8\xD0\xB5 \xD1\x81\xD1\x87\xD0\xB5\xD1\x82\xD0\xB0 \xD0\xB4\xD0\xBB\xD1\x8F \xD0\xBA\xD0\xBB\xD0\xB8\xD0\xB5\xD0\xBD\xD1\x82\xD0\xB0 #" . \Auth::user()->id);
            $arHash = array( $amount, $currency, $shop_id, $shop_order_id );
            $sign = hash("sha256", implode(":", $arHash));
            $data = array( "method" => "POST", "action" => "https://pay.piastrix.com/ru/pay", "charset" => "UTF-8", "fields" => array( "shop_id" => $shop_id, "shop_order_id" => $shop_order_id, "amount" => $amount, "currency" => $currency, "description" => $description, "sign" => $sign ) );
            return view("frontend.user.payment_form", compact("data"));
        }
        else if ($request->system == "coinpayment" )
        {
            if ($amount < config("coinpayment.add_min") )
            {
                return response()->json(array( "error" => trans("app.min_amount", array( "amount" => config("coinpayment.add_min") )) ), 422);
            }
            if (config("coinpayment.add_max") < $amount )
            {
                return response()->json(array( "error" => trans("app.max_amount", array( "amount" => config("coinpayment.add_max") )) ), 422);
            }
            $payment = \VanguardDK\Transaction::create(array( "user_id" => \Auth::user()->id, "summ" => abs($amount), "system" => $request->system, "room_id" => \Auth::user()->room_id, "status" => 0 ));
            $trx["amountTotal"] = $amount;
            $trx["note"] = "Adding money to a balance";
            $trx["items"][0] = array( "descriptionItem" => "Balance", "priceItem" => $amount, "qtyItem" => 1, "subtotalItem" => $amount );
            $trx["payload"] = array( "user_id" => \Auth::user()->id, "payment_id" => $payment->id );
            $link_transaction = \CoinPayment::url_payload($trx);


            return response()->json(array( "success" => "success", "link" => $link_transaction ), 200);
        } elseif ($request->system === 'free-kassa') {

            /** @var PaymentSystem $paymentSystem */
            $paymentSystem = PaymentSystem::where('type', PaymentSystem::TYPE_FREE_KASSA)->first();
            if ($paymentSystem === null) {
                return response()->json(array('error' => 'Платежная система не поддерживается'), 422);
            }

            if ($amount < $paymentSystem->min_amount) {
                return response()->json(
                    array(
                        'error' => trans('app.min_amount', array('amount' => $paymentSystem->min_amount))
                    ),
                    422
                );
            }
            if ($paymentSystem->max_amount < $amount) {
                return response()->json(
                    array(
                        'error' => trans('app.max_amount', array('amount' => $paymentSystem->max_amount))
                    ),
                    422
                );
            }

            $amount   = number_format($amount, 2, '.', '' );
            $payment = \VanguardDK\Payment::create(array(
                'user_id' => \Auth::user()->id,
                'summ' => $amount,
                'system' => $request->system
            ));
            $order_id = $payment->id;
            $merchant_id = $paymentSystem->getConfigParam('merchant_id');
            $secret_key_1 = $paymentSystem->getConfigParam('secret_key_1');
            $currency_id = $paymentSystem->getConfigParam('currency_id');
            $sign = md5("$merchant_id:$amount:$secret_key_1:$order_id");
            $data = array(
                'm' => $merchant_id,
                'oa' => $amount,
                'o' => $order_id,
                's' => $sign,
            );

            if (!empty($currency_id)) {
                $data['i'] = $currency_id;
            }

            $link_transaction =  $paymentSystem->getConfigParam('merchant_url') . '?' . http_build_query($data);

            return response()->json(array('success' => 'success', 'link' => $link_transaction), 200);
        }
    }
    // @ioncube.dk g39j81xw7udeumlohzvl() -> "WnyHAPZIlpzbwIb1gjj5Sf5ZZ6HkuDfpkTIuD3eEbGPpFwefpT"
    public function returns(\Illuminate\Http\Request $request)
    {
        $user = \Auth::user();
        $room = \VanguardDK\Room::find($user->room_id);
        $count_return = $user->count_return;
        $return = \VanguardDK\Returns::where("room_id", $user->room_id)->whereRaw("'" . $count_return . "' BETWEEN min_pay AND max_pay")->first();
        if ($return )
        {
            $sum = floatval($return->percent) / 100 * $count_return;
            if ($sum > 0 )
            {
                if ($room->balance < $sum )
                {
                    return response()->json(array( "fail" => "fail", "value" => 0, "balance" => $user->balance, "text" => "Not Money \"" . $room->name . "\"" ), 200);
                }
                $open_shift = \VanguardDK\OpenShift::where(array( "room_id" => \Auth::user()->room_id, "end_date" => NULL ))->first();
                if (!$open_shift )
                {
                    return response()->json(array( "fail" => "fail", "value" => 0, "balance" => $user->balance, "text" => "Shift not opened" ), 200);
                }
                $user->increment("balance", $sum);
                $user->increment("count_balance", $sum);
                $user->update(array( "count_return" => 0 ));
                $room->increment("balance", -1 * $sum);
                \VanguardDK\Transaction::create(array( "user_id" => $user->id, "summ" => abs($sum), "system" => "Refund", "room_id" => $user->room_id ));
                $open_shift->increment("balance_out", $sum);
                return response()->json(array( "success" => "success", "value" => $sum, "balance" => $user->balance ), 200);
            }
        }
        return response()->json(array( "success" => "success", "value" => 0, "balance" => $user->balance ), 200);
    }
    // @ioncube.dk g39j81xw7udeumlohzvl() -> "WnyHAPZIlpzbwIb1gjj5Sf5ZZ6HkuDfpkTIuD3eEbGPpFwefpT"
    public function success(\Illuminate\Http\Request $request)
    {
        return redirect()->route("frontend.profile.balance")->withSuccess(trans("app.payment_success"));
    }
    // @ioncube.dk g39j81xw7udeumlohzvl() -> "WnyHAPZIlpzbwIb1gjj5Sf5ZZ6HkuDfpkTIuD3eEbGPpFwefpT"
    public function fail(\Illuminate\Http\Request $request)
    {
        return redirect()->route("frontend.profile.balance")->withSuccess(trans("app.payment_fail"));
    }
}

function G39j81XW7uDeumlOhZVl()
{
    return "WnyHAPZIlpzbwIb1gjj5Sf5ZZ6HkuDfpkTIuD3eEbGPpFwefpT";
}


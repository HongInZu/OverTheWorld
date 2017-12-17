<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use App\GamePredict;
use Auth;

class IndexController extends Controller
{
    /**
     * 回應對 GET /edititem/1 的請求
     */
    public function getIndex()
    {
        $user = Auth::user();
        $permission = false;
        $isLogin = false;
        if ($user && !empty($user['until_date'])) {
            $isLogin = true;
            if ($user['user_type'] != 'member' || Carbon::now()->lte(Carbon::parse($user['until_date']))) {
                $permission = true;
            }
        }
        return view('overtheworld.index', ['results' => GamePredict::get()->groupBy('game_type'), 'legends' => \App\Legend::get(), 'permission' => $permission, 'user' => $user, 'isLogin' => $isLogin]);
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function postRegister(Request $request)
    {
        $user = new User;
        $user->mobile_phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->wechat = $request->wechat;
        $user->user_type = 'member';
        $user->until_date = Carbon::today();
        $user->save();
        return redirect('/');
    }

    public function postLoginAccount(Request $request)
    {
        Auth::attempt(['mobile_phone' => $request->phone, 'password' => $request->password]);
        return redirect('/');
    }
}
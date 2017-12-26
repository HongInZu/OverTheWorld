<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use App\GamePredict;
use Auth;
use App\GameBigAndSmall;
use App\GameBigAndSmallVip;
use App\GameVip;

class IndexController extends Controller
{
    /**
     * 回應對 GET /edititem/1 的請求
     */
    public function getIndex()
    {
        $user = Auth::user();
        $informations = \App\Information::get();
        $output = [];
        foreach ($informations as $key => $value) {
            $output[$value['name']] = $value['content'];
        }
        $permission = false;
        $isLogin = false;
        if ($user && !empty($user['until_date'])) {
            $isLogin = true;
            if ($user['user_type'] != 'member' || Carbon::now()->lte(Carbon::parse($user['until_date']))) {
                $permission = true;
            }
        }
        if (env('LANGUAGE') == 'CN') {
            return view('overtheworld.index-cn', 
                [
                'gamePredict' => GamePredict::get()->groupBy('legend_id'), 
                'gameBigAndSmall' => GameBigAndSmall::get()->groupBy('legend_id'), 
                'gameBigAndSmallVip' => GameBigAndSmallVip::get()->groupBy('legend_id'), 
                'gameVip' => GameVip::get()->groupBy('legend_id'), 
                'legends' => \App\Legend::where('status', 1)->get(), 
                'permission' => $permission, 
                'user' => $user, 
                'isLogin' => $isLogin, 
                'informations' => $output
                ]
            );
        } else {
            return view('overtheworld.index', 
                [
                'gamePredict' => GamePredict::get()->groupBy('legend_id'), 
                'gameBigAndSmall' => GameBigAndSmall::get()->groupBy('legend_id'), 
                'gameBigAndSmallVip' => GameBigAndSmallVip::get()->groupBy('legend_id'), 
                'gameVip' => GameVip::get()->groupBy('legend_id'), 
                'legends' => \App\Legend::where('status', 1)->get(), 
                'permission' => $permission, 
                'user' => $user, 
                'isLogin' => $isLogin, 
                'informations' => $output
                ]
            );
        }
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
        $user->until_date = Carbon::parse(Carbon::today());
        $user->save();
        return redirect('/');
    }

    public function postLoginAccount(Request $request)
    {
        Auth::attempt(['mobile_phone' => $request->phone, 'password' => $request->password]);
        return redirect('/');
    }
}
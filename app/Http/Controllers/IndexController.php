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
        $isLogin = false;
        if ($user) {
            $isLogin = true;
        }
        if (env('LANGUAGE') == 'CN') {
            return view('overtheworld.index-cn', 
                [
                'gamePredict' => GamePredict::orderBy('game_date', -1)->get()->groupBy('legend_id'), 
                'gameBigAndSmall' => GameBigAndSmall::orderBy('game_date', -1)->get()->groupBy('legend_id'), 
                'gameBigAndSmallVip' => GameBigAndSmallVip::orderBy('game_date', -1)->get()->groupBy('legend_id'), 
                'gameVip' => GameVip::orderBy('game_date', -1)->get()->groupBy('legend_id'), 
                'legends' => \App\Legend::where('status', 1)->get(), 
                'user' => $user, 
                'isLogin' => $isLogin, 
                'informations' => $output
                ]
            );
        } else {
            return view('overtheworld.index', 
                [
                'gamePredict' => GamePredict::orderBy('game_date', -1)->get()->groupBy('legend_id'), 
                'gameBigAndSmall' => GameBigAndSmall::orderBy('game_date', -1)->get()->groupBy('legend_id'), 
                'gameBigAndSmallVip' => GameBigAndSmallVip::orderBy('game_date', -1)->get()->groupBy('legend_id'), 
                'gameVip' => GameVip::orderBy('game_date', -1)->get()->groupBy('legend_id'), 
                'legends' => \App\Legend::where('status', 1)->get(), 
                'user' => $user, 
                'isLogin' => $isLogin, 
                'informations' => $output,
                'json' => json_encode(GamePredict::orderBy('game_date', -1)->get()->groupBy('legend_id'))
                ]
            );
        }
    }

    public function postResult(Request $request)
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


        switch ($request->input('type')) {
            case 'game_predict':
                $result = GamePredict::find($request->input('id'));
                $type = 1;
                break;
            case 'game_predict_bigandsmall':
                $result = GameBigAndSmall::find($request->input('id'));
                $type = 2;
                break;
            case 'game_predict_vip':
                $result = GameVip::find($request->input('id'));
                $type = 3;
                break;
            case 'game_predict_bigandsmall_vip':
                $result = GameBigAndSmallVip::find($request->input('id'));
                $type = 4;
                break;
            default:
                # code...
                break;
        }

            
        if ($result['game_over']) {
            $result['score'] = "{$result['game_bigger_score']} : {$result['game_smaller_score']}";
            if($result['game_result'] == $result['game_predict']) {
              $result['result'] = '<span style=" color: green">
                赢
              </span>';
            } else {
              $result['result'] = '<span style=" color: red">
                輸
              </span>';
            }
        } else {
            $result['score'] = '<span style=" color: blue">比賽結果尚未出爐</span>';
            $result['result'] = '<span style=" color: blue">比賽結果尚未出爐</span>';
        }

        // $result['handicap'] .= ($result['handicap_type'] == 1) ? ' 平' : '';


        $vip = json_decode($result['vip'], true);
        if ($vip) {
            $vip = in_array($user['mobile_phone'], $vip);
        } else {
            $vip = [];
        }
        
        switch ($type) {
            case 1:
                if ($permission || $result['game_over']) {
                    if ($result['game_predict_status'] == 1) {
                        $result['game_predict'] = ($result['game_predict'] == 0) ? $result['bigger'] : $result['smaller'];
                    } else {
                        $result['game_predict'] = '正在分析中';
                    } 
                } else {
                    $result['game_predict'] = '<span style="color: red">請先購買權限</span>';
                }
                break;
            case 2:
                if ($permission || $result['game_over']) {
                    if ($result['game_predict_status'] == 1) {
                        $result['game_predict'] = ($result['game_predict'] == 0) ? '大' : '小';
                    } else {
                        $result['game_predict'] = '正在分析中';
                    } 
                } else {
                    $result['game_predict'] = '<span style="color: red">請先購買權限</span>';
                }
                break;
            case 3:
                if ($vip || $result['game_over']) {
                    if ($result['game_predict_status'] == 1) {
                        $result['game_predict'] = ($result['game_predict'] == 0) ? $result['bigger'] : $result['smaller'];
                    } else {
                        $result['game_predict'] = '正在分析中';
                    } 
                } else {
                    $result['game_predict'] = '<span style="color: red">請先購買權限</span>';
                }
                break;
            case 4:
                if ($vip || $result['game_over']) {
                    if ($result['game_predict_status'] == 1) {
                        $result['game_predict'] = ($result['game_predict'] == 0) ? '大' : '小';
                    } else {
                        $result['game_predict'] = '正在分析中';
                    } 
                } else {
                    $result['game_predict'] = '<span style="color: red">請先購買權限</span>';
                }
                break;
            default:
                # code...
                break;
        }
        return $result;
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
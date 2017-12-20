<?php

namespace App\Http\Controllers;

use App\Order;
use App\GamePredict;
use App\GameBigAndSmall;
use App\User;
use App\Legend;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Auth;

class ManageController extends Controller
{
    /**
     * 回應對 GET /manageitem/food 的請求
     */
    public function getIndex()
    {

    }

    public function getOrder()
    {
        return view('admin.manage.order', ['orders' => Order::get()]);
    }

    public function getBall()
    {
        $legend = Legend::first();
        return view('admin.manage.ball', [
            'results' => GamePredict::where('legend_id', $legend['id'])->get(), 
            'legends' => Legend::get(),
            'ball' => $legend ]);
    }

    public function getBigAndSmallBall()
    {
        $legend = Legend::first();
        return view('admin.manage.bigsmallball', [
            'results' => GameBigAndSmall::where('legend_id', $legend['id'])->get(), 
            'legends' => Legend::get(),
            'ball' => $legend ]);
    }

    public function postBigAndSmallBall(Request $request)
    {
        $legend = Legend::find($request->legend);
        return view('admin.manage.ball', [
            'results' => GameBigAndSmall::where('legend_id', $legend['id'])->get(), 
            'legends' => Legend::get(), 
            'ball' => $legend ]);
    }


    public function postBall(Request $request)
    {
        $legend = Legend::find($request->legend);
        return view('admin.manage.ball', ['results' => GamePredict::where('legend_id', $legend['id'])->get(), 'legends' => Legend::get(), 'ball' => $legend ]);
    }


    public function getUser(Request $request)
    {
        return view('admin.manage.user', ['users' => User::where('user_type', '<>', 'root')->get()]);
    }

    public function postSaveGamePredict(Request $request)
    {
        $game_predict = GamePredict::find($request->game_predict_id);

        $requestArr = ['game_predict_status', 'game_over', 'game_bigger_score', 'game_smaller_score', 'game_predict', 'game_result'];

        foreach ($requestArr as $key => $value) {
            if (isset($request->{$value})) {
                if (is_array($request->{$value})) {
                    $game_predict->{$value} = json_encode($request->{$value});
                } else {
                    $game_predict->{$value} = $request->{$value};
                }
            } else {
                $game_predict->{$value} = '';
            }
        }

        if ($game_predict->save()) {
            return [true];
        } else {
            return [false];
        }
    }

    public function postSaveUserPermission(Request $request)
    {
        $user= User::find($request->user_id);

        $requestArr = ['until_date']; //user_type 先去除
        $request->until_date = Carbon::parse($request->until_date);
        foreach ($requestArr as $key => $value) {
            $user->{$value} = $request->{$value};
        }

        if ($user->save()) {
            return [true];
        } else {
            return [false];
        }
    }

    public function postPredictStatus(Request $request)
    {
        return GamePredict::find($request->id);
    }

    public function postUserPermission(Request $request)
    {
        $user = User::find($request->id);
        $user->until_date = Carbon::parse($user->until_date)->format('m/d/Y');
        return $user;
    }

    public function postSaveGameBigAndSmall(Request $request)
    {
        $game_predict = GameBigAndSmall::find($request->game_bigandsmall_id);

        $requestArr = ['game_predict_status', 'game_over', 'game_bigger_score', 'game_smaller_score', 'game_predict', 'game_result'];

        foreach ($requestArr as $key => $value) {
            if (isset($request->{$value})) {
                if (is_array($request->{$value})) {
                    $game_predict->{$value} = json_encode($request->{$value});
                } else {
                    $game_predict->{$value} = $request->{$value};
                }
            } else {
                $game_predict->{$value} = '';
            }
        }

        if ($game_predict->save()) {
            return [true];
        } else {
            return [false];
        }
    }
    public function postBigAndSmallStatus(Request $request)
    {
        return GameBigAndSmall::find($request->id);
    }

}
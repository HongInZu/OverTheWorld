<?php

namespace App\Http\Controllers;

use App\Order;
use App\GamePredict;
use App\User;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;


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

    public function getBallNba()
    {
        return view('admin.manage.ball-nba', ['results' => GamePredict::get()]);
    }

    public function getUser(Request $request)
    {
        return view('admin.manage.user', ['users' => User::get()]);
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

        $requestArr = ['user_type', 'until_date'];
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

}
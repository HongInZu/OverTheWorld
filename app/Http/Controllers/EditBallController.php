<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GamePredict;
use App\Image;
use Carbon\Carbon;

class EditBallController extends Controller
{
    /**
     * 回應對 GET /edititem/1 的請求
     */
    public function getIndex($id)
    {
        //
    }

    /**
     * 回應對 GET /edititem/todb 的請求
     */
    public function postTodb(Request $request)
    {
        if ($request->id != -1) {
            $game_predict = GamePredict::find($request->id);
        } else {
            $game_predict = new GamePredict;
        }
        $requestArr = ['bigger', 'smaller', 'handicap_type', 'handicap', 'game_bigger_score', 'game_smaller_score', 'game_predict', 'game_result', 'game_type'];
        $requestTime = ['game_date'];

        foreach ($requestTime as $key => $value) {
            if (isset($request->{$value})) {
                $game_predict->{$value} = Carbon::parse($request->{$value})->toDateString();
            } else {
                $game_predict->{$value} = '';
            }
        }

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
            return redirect("admin/manage/ball-{$request->game_type}");
        } else {
            return redirect("admin/manage/ball-{$request->game_type}");
        }
    }

    /**
     * 回應對 GET /edit/food/1 的請求
     */
    public function getNba($id = null)
    {
        if ($id != null) {
            $game_predict = GamePredict::find($id);
            $game_predict->game_date = Carbon::parse($game_predict->game_date)->format('m/d/Y');
            return view('admin.edit.nba', [
                                            'game' => $game_predict,
                                            ]);
        } else {
            return view('admin.edit.nba', ['game' => []]);
        }
    }
}
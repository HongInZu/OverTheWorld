<?php

namespace App\Http\Controllers;

use App\Order;
use App\GamePredict;
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
        return view('admin.manage.user', ['users' => GamePredict::get()]);
    }

    public function postSaveGamePredict(Request $request)
    {
        return GamePredict::find($request->id);
    }

    public function postPredictStatus(Request $request)
    {
        return GamePredict::find($request->id);
    }
}
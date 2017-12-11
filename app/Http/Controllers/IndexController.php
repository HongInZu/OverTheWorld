<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use App\GamePredict;


class IndexController extends Controller
{
    /**
     * 回應對 GET /edititem/1 的請求
     */
    public function getIndex()
    {
        return view('overtheworld.index', ['results' => GamePredict::get()]);
    }

}
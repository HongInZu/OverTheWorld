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
    	if ($user) {
    		if ($user['user_type'] != 'member' || Carbon::now()->lt($user['until_date'])) {
    			$permission = true;
    		}
    	} else {
    		$permission = false;
    	}
        return view('overtheworld.index', ['results' => GamePredict::get()->groupBy('game_type'), 'legends' => \App\Legend::get(), 'permission' => $permission]);
    }

}
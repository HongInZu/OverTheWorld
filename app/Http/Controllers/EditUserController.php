<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use Auth;

class EditUserController extends Controller
{
    /**
     * 回應對 GET /edititem/1 的請求
     */
    public function getUser($id = null)
    {
        if ($id != null) {
            $user = User::find($id);
            return view('admin.edit.user', [
                                            'user' => $user,
                                            ]);
        } else {
            return view('admin.edit.user', ['user' => []]);
        }    
    }

    public function postLogin(Request $request)
    {
        if (Auth::attempt(['mobile_phone' => $request->account, 'password' => $request->password])) {
            return redirect('/admin');
        } else {
            return view('admin.login');
        }
    }

    /**
     * 回應對 GET /edititem/todb 的請求
     */
    public function postTodb(Request $request)
    {
        if ($request->id != -1) {
            $game_predict = User::find($request->id);
        } else {
            $game_predict = new User;
        }
        $requestArr = ['mobile_phone', 'password', 'name', 'user_type', 'until_date'];
        $request->password = bcrypt($request->password);
        foreach ($requestArr as $key => $value) {
            if (isset($request->{$value})) {
              $game_predict->{$value} = $request->{$value};
            } else {
              $game_predict->{$value} = '';
            }
        }
        if ($game_predict->save()) {
            return redirect("admin/manage/user");
        } else {
            return redirect("admin/manage/user");
        }
    }
}
<?php
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('admin/login', function () {
	Auth::logout();
    return view('admin.login');
});

Route::get('admin/logout', function () {
	Auth::logout();
    return redirect('admin/login');
});

Route::post('admin/login', 'EditUserController@postLogin');

Route::group(['middleware' => 'auth.login'], function () {
	//backstage
	Route::get('admin', function () {
	    return view('layout.table');
	});

	Route::controller('admin/manage', 'ManageController');

	Route::get('admin/edit-ball/{code}/{id}', function($code, $id) {
		$legend = App\Legend::where('code', $code)->first();
	    $game_predict = App\GamePredict::find($id);
	    $game_predict->game_date = Carbon\Carbon::parse($game_predict->game_date)->format('m/d/Y');
	    return view('admin.edit.ball', ['game' => $game_predict, 'legend' => $legend]);
	});

	Route::get('admin/add-ball/{code}', function($code) {
		$legend = App\Legend::where('code', $code)->first();
		return view('admin.edit.ball', ['legend' => $legend]);
	});

	Route::controller('admin/manage-item', 'ManageItemController');
	Route::controller('admin/edit-ball', 'EditBallController');
	Route::controller('admin/edit-user', 'EditUserController');

	Route::get('admin/legend-table', 'AddLegendController@getLegendTable');

	Route::get('admin/add/legend', function() {
	    return view('admin.add.legend');
	});

	Route::post('/admin/add/legend-todb', function(Request $request){
		$input = $request->only('name', 'code');
		$legend = new App\Legend();
		foreach ($input as $key => $value) {
			if(!empty($value)) {
				$legend->{$key} = $value;
			}
		}
		$legend->save();
		return redirect('/admin/legend-table');
	});

	Route::get('/admin/pauseEverybody', function() {
	    return view('admin.pause');
	});

	Route::post('/admin/pauseEverybody', function(Request $request) {
		if ($request->password == 'admin666') {
			$user = App\User::where('user_type', 'admin');
			$user->update(['status' => 0]);
		}
		return redirect('/admin/legend-table');
	});
});
// 認證路由...
Route::controller('', 'IndexController');


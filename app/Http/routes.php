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

	Route::get('admin/edit-ball/{legend_id}/{id}', function($legend_id, $id) {
		$legend = App\Legend::find($legend_id);
	    $game_predict = App\GamePredict::find($id);
	    $game_predict->game_date = Carbon\Carbon::parse($game_predict->game_date)->format('m/d/Y');
	    return view('admin.edit.ball', ['game' => $game_predict, 'legend' => $legend]);
	});

	Route::get('admin/edit-bigandsmall/{legend_id}/{id}', function($legend_id, $id) {
		$legend = App\Legend::find($legend_id);
	    $game_predict = App\GameBigAndSmall::find($id);
	    $game_predict->game_date = Carbon\Carbon::parse($game_predict->game_date)->format('m/d/Y');
	    return view('admin.edit.bigandsmall', ['game' => $game_predict, 'legend' => $legend]);
	});

	Route::get('admin/edit-ball-vip/{legend_id}/{id}', function($legend_id, $id) {
		$legend = App\Legend::find($legend_id);
	    $game_predict = App\GameVip::find($id);
	    $game_predict->game_date = Carbon\Carbon::parse($game_predict->game_date)->format('m/d/Y');
	    return view('admin.edit.ball', ['game' => $game_predict, 'legend' => $legend]);
	});

	Route::get('admin/edit-bigandsmall-vip/{legend_id}/{id}', function($legend_id, $id) {
		$legend = App\Legend::find($legend_id);
	    $game_predict = App\GameBigAndSmallVip::find($id);
	    $game_predict->game_date = Carbon\Carbon::parse($game_predict->game_date)->format('m/d/Y');
	    return view('admin.edit.bigandsmall', ['game' => $game_predict, 'legend' => $legend]);
	});


	Route::get('admin/add-ball/{id}', function($id) {
		$legend = App\Legend::find($id);
		return view('admin.edit.ball', ['legend' => $legend]);
	});

	Route::get('admin/add-bigandsmall/{id}', function($id) {
		$legend = App\Legend::find($id);
		return view('admin.edit.bigandsmall', ['legend' => $legend]);
	});

	Route::get('admin/add-ball-vip/{id}', function($id) {
		$legend = App\Legend::find($id);
		return view('admin.edit.ball-vip', ['legend' => $legend]);
	});

	Route::get('admin/add-bigandsmall-vip/{id}', function($id) {
		$legend = App\Legend::find($id);
		return view('admin.edit.bigandsmall-vip', ['legend' => $legend]);
	});

	Route::controller('admin/manage-item', 'ManageItemController');
	Route::post('admin/edit-ball/todb', 'EditBallController@postTodb');
	Route::post('admin/edit-bigandsmall/todb', 'EditBallController@postBigAndSmallTodb');

	Route::post('admin/edit-ball-vip/todb', 'EditBallController@postBallVipTodb');
	Route::post('admin/edit-bigandsmall-vip/todb', 'EditBallController@postBigAndSmallVipTodb');

	Route::controller('admin/edit-user', 'EditUserController');

	Route::get('admin/legend-table', 'AddLegendController@getLegendTable');

	Route::get('admin/add/legend', function() {
	    return view('admin.add.legend');
	});

	Route::post('/admin/add/legend-todb', function(Request $request){
		$input = $request->only('name', 'bet_type');
		$legend = new App\Legend();
		foreach ($input as $key => $value) {
			if(!empty($value)) {
				$legend->{$key} = $value;
			}
		}
		$legend->save();
		return redirect('/admin/legend-table');
	});

	Route::get('admin/edit/legend/{id}', function($id) {
		$legend = App\Legend::find($id);
	    return view('admin.edit.legend', ['legend' => $legend]);
	});

	Route::post('/admin/edit/legend-todb/', function(Request $request){
		$input = $request->only('id', 'name');
		$legend = App\Legend::find($input['id']);
		$legend->name = $input['name'];
		$legend->save();
		return redirect('/admin/legend-table');
	});

	Route::get('/admin/pauseEverybody', function() {
	    return view('admin.pause');
	});

	Route::post('/admin/pauseEverybody', function(Request $request) {
		if ($request->password == 'maydaymayday') {
			$user = App\User::where('user_type', 'admin');
			$user->update(['status' => 0]);
		}
		return redirect('/admin/legend-table');
	});

	Route::get('/admin/edit-information', function(Request $request) {
		$informations = App\Information::get();
		$output = [];
		foreach ($informations as $key => $value) {
			$output[$value['name']] = $value['content'];
		}
	    return view('admin.edit.information', ['informations' => $output]);
	});

	Route::post('/admin/edit-information/todb', function(Request $request) {
		$informations = $request->all();
		foreach ($informations as $key => $value) {
			if ($key == '_token') continue;
			$model = App\Information::where('name', $key)->first();
			if ($model) {
				$model->content = $value;
			} else {
				$model = new App\Information;
				$model->name = $key;
				$model->content = $value;
			}
			$model->save();
		}
		return redirect('/admin/edit-information');
	});
});
// 認證路由...
Route::controller('', 'IndexController');


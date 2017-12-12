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

//backstage
Route::get('admin', function () {
    return view('layout.table');
})->middleware(['auth.login']);

Route::get('admin/login', function () {
    return view('admin.login');
});

Route::post('admin/login', 'EditUserController@postLogin');

Route::controller('admin/manage', 'ManageController');

Route::get('admin/edit-ball/{code}/{id}', function($code, $id) {
	$legend = App\Legend::where('code', $code)->first();
    $game_predict = App\GamePredict::find($id);
    $game_predict->game_date = Carbon\Carbon::parse($game_predict->game_date)->format('m/d/Y');
    return view('admin.edit.ball', ['game' => $game_predict, 'legend' => $legend]);
})->middleware(['auth.login']);

Route::get('admin/add-ball/{code}', function($code) {
	$legend = App\Legend::where('code', $code)->first();
	return view('admin.edit.ball', ['legend' => $legend]);
})->middleware(['auth.login']);

Route::controller('admin/manage-item', 'ManageItemController');
Route::controller('admin/edit-ball', 'EditBallController');
Route::controller('admin/edit-user', 'EditUserController');

Route::get('admin/legend-table', 'AddLegendController@getLegendTable')->middleware(['auth.login']);

Route::get('admin/add/legend', function() {
    return view('admin.add.legend');
})->middleware(['auth.login']);

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
})->middleware(['auth.login']);

// 認證路由...
Route::controller('', 'IndexController');


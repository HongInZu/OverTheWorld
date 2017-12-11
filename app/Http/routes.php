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
});

Route::controller('admin/manage', 'ManageController');
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
	return redirect('admin/legend');
});
// 認證路由...
Route::controller('', 'IndexController');


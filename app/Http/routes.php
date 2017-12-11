<?php

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
Route::controller('admin/manage-hotel', 'ManageHotelController');
Route::controller('admin/edit-ball', 'EditBallController');
Route::controller('admin/edit-user', 'EditUserController');
// 認證路由...
Route::controller('', 'IndexController');


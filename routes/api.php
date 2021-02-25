<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::namespace ('Api')->group(function () {
	Route::any('login', 'ApiController@login');
	Route::any('logout', 'ApiController@logoserverconfigut');
	Route::any('apitokencheck', 'ApiController@apitokencheck');

	Route::any('ano/login', 'AnotherController@login');

	// Route::any('index', 'Apiindex@index');
	// Route::any('winlose', 'Apiindex@winlose');
	// Route::any('bethistory', 'Apiindex@bethistory');
	// Route::any('allreport', 'Apiindex@allreport');
	// Route::any('loginat', 'Apiindex@loginat');
	// Route::any('actionlog', 'Apiindex@actionlog');

	// Route::any('sidebar', 'Apiarray@sidebar');

	Route::any('newarray', 'Apiarray@newarray');

});

Route::namespace('MAXdis')->group(function(){
	Route::any('sidebar','Apiindex@sidebar');

	Route::any('playersave','Apiindex@playersave');
	Route::any('game','Apiindex@game');
	Route::any('gameinfo','Apiindex@gameinfo');
	Route::any('report','Apiindex@report');
	Route::any('reportdtl','Apiindex@reportdtl');
	Route::any('serverconfig','Apiindex@serverconfig');
	Route::any('player','Apiindex@player');

	Route::any('account/u','Apiindex@accountupdate');
});


// Route::post('login', 'ApiController@login');
// Route::post('register', 'ApiController@register');

// Route::group(['middleware' => 'auth.jwt'], function () {
// 	Route::get('logout', 'ApiController@logout');

// 	Route::get('tasks', 'TaskController@index');
// 	Route::get('tasks/{id}', 'TaskController@show');
// 	Route::post('tasks', 'TaskController@store');
// 	Route::put('tasks/{id}', 'TaskController@update');
// 	Route::delete('tasks/{id}', 'TaskController@destroy');
// });

/**
 * addgoods
 */
// Route::middleware('mustlogin')->
Route::delete('addgoods/d/{id}', 'MallController@goodsdelete')->name('mallgoods.delete');

// Route::middleware('mustlogin')->
Route::post('addgoods', 'MallController@goodscreate')->name('mallgoods.create');

/**
 * Test
 */
Route::middleware('auth:api')->get('/user', function (Request $request) {
	return $request->user();
});
Route::get('/hello/{name}', function ($name) {
	return 'Hello World' . $name;
});
Route::any('/biz/file/upload', 'FileController@upload');

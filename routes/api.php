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
Route::namespace('ApiManager')->group(function(){
	/**
	 * 
	 */
	Route::any('login', 'LoginController@login');
	Route::any('logout', 'LoginController@logout');
	Route::any('apitokencheck', 'LoginController@apitokencheck');

	Route::any('ano/login', 'LoginTestController@login');

	Route::any('sidebar','IndexController@sidebar');

	/**
	 * 帳戶管理
	 */
	// Route::any('agent','AccountController@agent');
	// Route::any('agent/c','AccountController@agentcreate')->name('playercreate');
	// Route::any('agent/u','AccountController@agentupdate');

	Route::any('player','AccountController@player');
	Route::post('player/c','AccountController@playercreate')->name('playercreate');
	Route::post('player/u','AccountController@playerupdate');

	Route::any('provider','AccountController@provider');
	Route::any('provider/c','AccountController@providercreate')->name('providercreate');
	Route::any('provider/u','AccountController@providerupdate');

	/**
	 * 設定
	 */
	Route::any('account','SettingController@account');
	Route::any('account/c','SettingController@accountcreate');
	Route::any('account/u','SettingController@accountupdate');

	Route::any('playersave','SettingController@playersave');
	Route::any('playersave/c','SettingController@playersavecreate')->name('playersavecreate');
	Route::any('playersave/u','SettingController@playersaveupdate');

	/**
	 * 報表
	 */
	Route::any('winlose','ReportController@winlose');
	Route::any('winlose/c','ReportController@winlosecreate');

	Route::any('bethistory','ReportController@bethistory');
	Route::any('bethistory/c','ReportController@bethistorycreate');

	// Route::any('reportcombine','ReportController@reportcombine');
	// Route::any('reportcombine/c','ReportController@reportcombinecreate');
	// Route::any('reportcombine/u','ReportController@reportcombineupdate');

	// Route::any('report','ReportController@report');
	// Route::any('report/c','ReportController@reportcreate')->name('reportcreate');

	// Route::any('reportdtl','ReportController@reportdtl');

	// Route::any('wallet', 'ReportController@wallet');
	// // Route::any('wallet/c', 'IndexController@walletcreate');
	// Route::any('wallet/u', 'ReportController@walletupdate');

	/**
	 * 記錄
	 */
	Route::any('actionlog', 'OperationController@actionlog');

	Route::any('loginlog', 'OperationController@loginlog');	

	/**
	 * 遊戲管理
	 */
	// Route::any('game','GameController@game');
	// Route::any('game/c','GameController@gamecreate')->name('gamecreate');
	// Route::any('game/u','GameController@gameupdate');

	// Route::any('gameinfo','GameController@gameinfo');
	// Route::any('gameinfo/c','GameController@gameinfocreate')->name('gameinfocreate');
	// Route::any('gameinfo/u','GameController@gameinfoupdate');

	Route::any('serverconfig','GameController@serverconfig');
	Route::any('serverconfig/u','GameController@serverconfigupdate');

	Route::any('gamenew','GameController@gamenew');
	Route::any('gamenew/c','GameController@gamenewcreate')->name('gamenewcreate');
	Route::any('gamenew/u','GameController@gamenewupdate');

	// Route::middleware('ActionLogAfter')->any('member','IndexController@member');
	Route::any('member','IndexController@member');
});

Route::namespace('ApiManager')->group(function(){
// 	Route::any('login', 'LoginController@login');
// 	Route::any('logout', 'LoginController@logout');
// 	Route::any('apitokencheck', 'LoginController@apitokencheck');

// 	Route::any('ano/login', 'LoginTestController@login');

// 	Route::any('sidebar','IndexController@sidebar');

// 	Route::any('playersave','IndexController@playersave');
// 	Route::any('playersave/c','IndexController@playersavecreate')->name('playersavecreate');
// 	Route::any('playersave/u','IndexController@playersaveupdate');

// 	Route::any('game','IndexController@game');
// 	Route::any('game/c','IndexController@gamecreate')->name('gamecreate');
// 	Route::any('game/u','IndexController@gameupdate');
	
// 	Route::any('gameinfo','IndexController@gameinfo');
// 	Route::any('gameinfo/c','IndexController@gameinfocreate')->name('gameinfocreate');
// 	Route::any('gameinfo/u','IndexController@gameinfoupdate');

// 	Route::any('provider','IndexController@provider');
// 	Route::any('provider/c','IndexController@providercreate')->name('providercreate');
// 	Route::any('provider/u','IndexController@providerupdate');

// 	Route::any('reportcombine','IndexController@reportcombine');
// 	Route::any('reportcombine/c','IndexController@reportcombinecreate');
// 	Route::any('reportcombine/u','IndexController@reportcombineupdate');

// 	Route::any('report','IndexController@report');
// 	Route::any('report/c','IndexController@reportcreate')->name('reportcreate');

// 	Route::any('reportdtl','IndexController@reportdtl');

// 	Route::any('serverconfig','IndexController@serverconfig');
// 	Route::any('serverconfig/u','IndexController@serverconfigupdate');
	
// 	Route::any('player','IndexController@player');
// 	Route::post('player/c','IndexController@playercreate')->name('playercreate');
// 	Route::post('player/u','IndexController@playerupdate');

// 	Route::any('agent','IndexController@agent');
// 	Route::any('agent/c','IndexController@agentcreate')->name('playercreate');
// 	Route::any('agent/u','IndexController@agentupdate');

// 	// Route::middleware('ActionLogAfter')->any('member','IndexController@member');
// 	Route::any('member','IndexController@member');

	// Route::any('gamenew','IndexController@gamenew');
	// Route::any('gamenew/c','IndexController@gamenewcreate')->name('gamenewcreate');
	// Route::any('gamenew/u','IndexController@gamenewupdate');

// 	Route::any('loginlog', 'IndexController@loginlog');

// 	Route::any('actionlog', 'IndexController@actionlog');

// 	Route::any('wallet', 'IndexController@wallet');
// 	// Route::any('wallet/c', 'IndexController@walletcreate');
// 	Route::any('wallet/u', 'IndexController@walletupdate');
});



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

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
	Route::any('login', 'LoginController@login');
	Route::any('logout', 'LoginController@logout');
	Route::any('apitokencheck', 'LoginController@apitokencheck');

	Route::any('ano/login', 'LoginTestController@login');

	Route::any('sidebar','IndexController@sidebar');

	Route::any('playersave','IndexController@playersave');
	Route::any('playersave/c','IndexController@playersavecreate');
	Route::any('playersave/u','IndexController@playersaveupdate');

	Route::any('game','IndexController@game');
	Route::any('game/c','IndexController@gamecreate');
	Route::any('game/u','IndexController@gameupdate');
	
	Route::any('gameinfo','IndexController@gameinfo');
	Route::any('gameinfo/c','IndexController@gameinfocreate');
	Route::any('gameinfo/u','IndexController@gameinfoupdate');

	Route::any('provider','IndexController@provider');
	Route::any('provider/c','IndexController@providercreate');
	Route::any('provider/u','IndexController@providerupdate');

	Route::any('reportcombine','IndexController@reportcombine');
	Route::any('report','IndexController@report');
	Route::any('report/c','IndexController@reportcreate');

	Route::any('reportdtl','IndexController@reportdtl');

	Route::any('serverconfig','IndexController@serverconfig');
	Route::any('serverconfig/u','IndexController@serverconfigupdate');
	
	Route::any('player','IndexController@player');
	Route::post('player/c','IndexController@playercreate');
	Route::post('player/u','IndexController@playerupdate');

	Route::any('agent','IndexController@agent');

	Route::middleware('ActionLogBefore')->any('member','IndexController@member');
	// Route::middleware('ActionLogAfter')->any('member','IndexController@member');

	Route::any('gamenew','IndexController@gamenew');
	Route::any('gamenew/c','IndexController@gamenewcreate');
	Route::any('gamenew/u','IndexController@gamenewupdate');

	Route::any('loginlog', 'IndexController@loginlog');
});



// Route::namespace ('Api')->group(function () {
// 	Route::any('login', 'ApiController@login');
// 	Route::any('logout', 'ApiController@logout');
// 	Route::any('apitokencheck', 'ApiController@apitokencheck');

// 	Route::any('ano/login', 'AnotherController@login');

// 	// Route::any('index', 'Apiindex@index');
// 	// Route::any('winlose', 'Apiindex@winlose');
// 	// Route::any('bethistory', 'Apiindex@bethistory');
// 	// Route::any('allreport', 'Apiindex@allreport');
// 	// Route::any('loginat', 'Apiindex@loginat');
// 	// Route::any('actionlog', 'Apiindex@actionlog');

// 	// Route::any('sidebar', 'Apiarray@sidebar');

// 	Route::any('newarray', 'Apiarray@newarray');

// });

// Route::namespace('MAXdis')->group(function(){
// 	Route::any('sidebar','Apiindex@sidebar');

// 	Route::any('playersave','Apiindex@playersave');
// 	Route::any('playersave/c','Apiindex@playersavecreate');
// 	Route::any('playersave/u','Apiindex@playersaveupdate');

// 	Route::any('game','Apiindex@game');
// 	Route::any('game/c','Apiindex@gamecreate');
// 	Route::any('game/u','Apiindex@gameupdate');
	
// 	Route::any('gameinfo','Apiindex@gameinfo');
// 	Route::any('gameinfo/c','Apiindex@gameinfocreate');
// 	Route::any('gameinfo/u','Apiindex@gameinfoupdate');

// 	Route::any('provider','Apiindex@provider');
// 	Route::any('provider/c','Apiindex@providercreate');
// 	Route::any('provider/u','Apiindex@providerupdate');

// 	Route::any('report','Apiindex@report');
// 	Route::any('report/c','Apiindex@reportcreate');

// 	Route::any('reportdtl','Apiindex@reportdtl');

// 	Route::any('serverconfig','Apiindex@serverconfig');
// 	Route::any('serverconfig/u','Apiindex@serverconfigupdate');
	
// 	Route::any('player','Apiindex@player');
// 	Route::post('player/c','Apiindex@playercreate');
// 	Route::post('player/u','Apiindex@playerupdate');
	
// });


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

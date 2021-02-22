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

Route::namespace('Api')->group(function (){
    Route::any('test', 'ApiController@test');
    Route::any('logout', 'ApiController@logout');
    Route::any('logincheck', 'ApiController@logincheck');

    Route::any('ano/test','AnotherController@sendbalance');

    Route::any('index', 'Apiindex@index');
    Route::any('winlose', 'Apiindex@winlose');
    Route::any('bethistory', 'Apiindex@bethistory');
    Route::any('allreport', 'Apiindex@allreport');
    Route::any('loginat', 'Apiindex@loginat');
    Route::any('actionlog', 'Apiindex@actionlog');

});


Route::post('login', 'ApiController@login');
Route::post('register', 'ApiController@register');

Route::group(['middleware' => 'auth.jwt'], function () {
    Route::get('logout', 'ApiController@logout');

    Route::get('tasks', 'TaskController@index');
    Route::get('tasks/{id}', 'TaskController@show');
    Route::post('tasks', 'TaskController@store');
    Route::put('tasks/{id}', 'TaskController@update');
    Route::delete('tasks/{id}', 'TaskController@destroy');
});





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
    return 'Hello World'.$name;
});
Route::any('/biz/file/upload', 'FileController@upload');
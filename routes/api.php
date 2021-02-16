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
    // Route::any('ano/test', 'ApiController@anothertest');
    Route::any('ano/test','AnotherController@sendbalance');
    
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
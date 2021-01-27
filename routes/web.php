<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
Route::resource('cke', 'CKEcontroller');
Route::post('ckeditor/image_upload', 'CKEcontroller@upload')->name('CKE.upload');
Route::post('ckeditor/image_upload', 'CKEcontroller@uploadTextArea')->name('CKE1.upload');

/**
 * 登入帳密之驗證
 */
Route::post('catch', 'UserController@catch')->name('catch');

/*
//已有驗證機制
 */
Route::get('logout', 'LoginController@logout')->name('logout');

Route::middleware('mustlogout')->get('login', 'LoginController@loginpage')->name('login');
Route::middleware('mustlogin')->get('/', 'LoginController@homepage')->name('homepage');
Route::middleware('mustlogin')->get('userlist', 'UserController@userlist')->name('userlist');
/**
 * CRUD
 */
Route::middleware('mustlogin')->post('userlist', 'UserController@create')->name('userlist.create');
Route::middleware('mustlogin')->put('userlist/{id}', 'UserController@update')->name('userlist.update');
Route::middleware('mustlogin')->post('userlist/d/{id}', 'UserController@delete')->name('userlist.delete');
/**
 *
 */

/**
 * 搜尋功能
 */
Route::get('query', 'UserController@query')->name('query');

/**
 * 商品調整相關
 */
Route::middleware('mustlogin')->get('addclassify', 'MallController@addclassify')->name('mallclassify');
Route::middleware('mustlogin')->post('addclassify', 'MallController@classifycreate')->name('mallclassify.create');

Route::middleware('mustlogin')->get('addkeyword', 'MallController@addkeyword')->name('mallkeyword');
Route::middleware('mustlogin')->post('addkeyword', 'MallController@keywordcreate')->name('mallkeyword.create');

Route::middleware('mustlogin')->get('addphoto', 'MallController@addphoto')->name('mallphoto');
Route::middleware('mustlogin')->post('addphoto', 'MallController@photocreate')->name('mallphoto.create');

Route::middleware('mustlogin')->get('addgoods', 'MallController@addgoods')->name('mallgoods');
Route::middleware('mustlogin')->post('addgoods', 'MallController@goodscreate')->name('mallgoods.create');
Route::middleware('mustlogin')->post('addgoods/d/{id}', 'MallController@goodsdelete')->name('mallgoods.delete');
Route::middleware('mustlogin')->post('addgoods/re/{id}', 'MallController@goodsrelease')->name('mallgoods.release');
Route::middleware('mustlogin')->post('addgoods/{id}', 'MallController@goodsupdate')->name('mallgoods.update');
// Route::middleware('mustlogin')->get('addgoods', function () {
//     echo 'under contract...';
// });

Route::middleware('mustlogin')->get('newaddgoods', 'NewMallController@Index')->name('mallgoods');


// Route::resource('crudtest', 'CRUDtestcontroller');
// Route::get('users', function () {
//     return dd(App\User::paginate());
// });
// Route::get('user', 'LoginController@query');

/**
 *
 * test
 */
// Route::get('/test', 'LoginController@ajaxcrud');
Route::get('/test', function () {
	return view('test.selectinputmodal');
});
Route::get('/test2', 'MallController@test');

Route::get('copy', function () {
	return view('test.copy');
});
Route::get('copy2', function () {
	return view('test.copy2');
});
Route::get('newaddgoods2', function () {
	return view('mall.newaddgoods2');
});
Route::get('newaddgoods3', function () {
	return view('mall.newaddgoods3');
});
Route::get('newaddgoods4', function () {
	return view('mall.newaddgoods4');
});
Route::get('swiper', function () {
	return view('test.swiper');
});
// Route::get('/JQtest', function () {
//     return view('test.JQuerytest');
// });
// Route::get('welcome', function () {
//     return view('test.welcome');
// });
// Route::get('hello/{name}', function ($name) {
//     return 'Hello ' . $name;
// });

// Route::middleware('before')->get('/before', function (){
//     echo 'in Route';
// });
// Route::middleware('after')->get('/after', function (){
//     echo 'in Route';
// });

Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
	->name('ckfinder_connector');

Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
	->name('ckfinder_browser');
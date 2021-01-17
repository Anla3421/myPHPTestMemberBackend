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
Route::middleware('mustlogin')->get('userlist', 'LoginController@userlist')->name('userlist');
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













// Route::group(['middleware' => [ ],'prefix'=>'user'], function () {
    //首頁
// Route::get('/','UserController@index');
    //搜尋
// Route::get('/search','UserController@search');

// });



// Route::middleware('before')->get('/before', function (){
//     echo 'in Route';
// });
Route::middleware('after')->get('/after', function (){
    echo 'in Route';
});

Route::get('/111', function () {
    return view('CRUDindex');
});
// Route::resource('crudtest', 'CRUDtestcontroller');
// Route::get('users', function () {
//     return dd(App\User::paginate());
// });
// Route::get('user', 'LoginController@query');

/**
 * 
 * test
 */
Route::get('/test', 'LoginController@ajaxcrud');

Route::get('/JQtest', function () {
    return view('JQuerytest');
});
Route::get('welcome', function () {
    return view('welcome');
});
Route::get('hello/{name}', function ($name) {
    return 'Hello ' . $name;
});

/** 
 * 已登入
 */

    /**
     * UserList USE UserController
     */

// Route::post('userlist', 'LoginController@query')->name('postuserlist');
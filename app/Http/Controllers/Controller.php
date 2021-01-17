<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}


// public function catch (Request $request) {
//     echo "<pre>";
//         print_r($request->all());
//         //  print_r($request->only('name','password'));

//     $nameandpwd = $request->only('name', 'password');
//     echo "<pre>";
//     print_r($nameandpwd) ;
//     // var_dump(Auth::attempt($nameandpwd)); //用此debug Auth::attempt bool值會直接顯示，用其他可能回傳空白
//     // dd($nameandpwd); //一個視覺化的陣列顯示器

//     // if(Auth::attempt($nameandpwd)){ //比對陣列內所有資料，但最少要有name & password兩項不然會噴錯
//     // 	echo 'Auth result True'.'<br>';
//     // }
//     // if (Auth::attempt(['name' => $nameandpwd['name'], 'password' => $nameandpwd['password'],'remember_check'=>'on'])) { //比對DB裡面有沒有符合'$nameandpwd['name']'這筆資料
//     // 	echo 'Authentication was successful...'.'<br>';
//     // }
    
//     // foreach($errors->all() as $error); //在view

//     if (Auth::attempt($nameandpwd)) {
//         // if(array_key_exists('remember_check',$request->only('remember_check'))) //array_key_exists()
//         if($request->has('remember_check')) //->has()
//         {
//             DB::table('users')->where('name', $request->only('name'))->update([
//                 'remember_check' => 'on'
//                 ]);
//         }
//         $request->session()->regenerate();
//         return redirect()->intended('/'); //頁面導向

//         // Auth::logout();
//         // var_dump(Auth::login('123'));
//         // var_dump(url()->current()=='http://test777.ukyo.idv.tw/catch');
//     }else{
//         return back()->withErrors([
//         'name' => '名稱或是密碼錯誤，請確認後再次輸入。',
//         'sf' => '陣列測試',
//         ]);
//     }
// }
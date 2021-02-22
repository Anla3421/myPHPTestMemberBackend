<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use App\models\photo;
use App\models\shop;
use App\models\classify;

class LoginController extends Controller {

	//首頁跳轉
	public function homepage(Request $request) {
		
		$top=shop::where('top','1')->where('release','1')->pluck('id');
		$classify=classify::all();
		$ntop=$top->toarray();
		echo "<pre>";
		var_dump($classify);
		// echo "<pre>";
		// print_r($classify);
		// print_r($a[0]); //randomized ntop keys
		// print_r(count($ntop));
		// print_r($photo);

		if (count($ntop)>1) {
			$a=array_rand($ntop,2);
			$rng=shuffle($a);
			$rngphoto1=photo::where('shop_id',$ntop[$a[0]])->get();
			$rngphoto2=photo::where('shop_id',$ntop[$a[1]])->get();
			return view('homepage',['photo'=>$rngphoto1,'classify'=>$classify],['photo2'=>$rngphoto2]);
		}
		return view('homepage',['classify'=>$classify,'photo'=>null,'photo2'=>null]);
	}

	//login頁面跳轉
	public function loginpage() {
		return view('login');
	}



	//使用者登出
	public function logout(Request $request) {
		if (Auth::check()) {
			Auth::logout();
			return redirect()->intended('/');
		} else {
			return back();
		}

	}







	
	// public function login(){
	//     if(Auth::check()){
	//         echo 'Auth status: yes';
	//         return view('login2');
	// 	}else{
	// 		echo 'Auth status: no';
	// 		return view('login');
	// 	}}

	public function ajaxcrud(Request $request) {
		// $insert=User::Create();
		// $name->request->account,
		echo '<pre>';
		print_r($request);
		// ]);

		// DB::table('users')->insert([
		//     'account' =>'aaaaa',
		//     'name' => '99999',
		//     'password' => Hash::make('99999'),
		//     'gender' =>'male',
		//     'remember_check' =>'ok',
		//     'remember_token' =>'NULL',
		//     'cellphone' => '0987987987',
		//     'created_at' => date('Y-m-d H:i:s'),
		//     'updated_at' => date('Y-m-d H:i:s',$newtime),
		// ]);

	}

}
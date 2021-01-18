<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;


class LoginController extends Controller {
	
	//首頁跳轉
	public function homepage() { 
		return view('homepage');		
	}
	
	//login頁面跳轉
	public function loginpage(){ 
		return view('login');
	}

	//Userlist跳轉&讀取DB
	public function userlist(Request $request){
		$data=User::paginate(10);
		// $data->setPath('userlist/2');
		// echo "<pre>";
		// print_r($data->all());
		return view('userlist',['data'=>$data]);
	}
	
	//使用者登出
	public function logout(Request $request){
		if(Auth::check()){
			Auth::logout();
			return redirect()->intended('/');
		}else{
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
	
	

	public function ajaxcrud(Request $request){
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
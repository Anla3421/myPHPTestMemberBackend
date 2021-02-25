<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Exception;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;

class ApiController extends Controller {
	// public $unixtime;
	protected $salt;
	public function __construct() {
		// parent::__construct();
		$this->salt = env('APP_SALT','iamsalt');
	}
	public function login(Request $request) {
		$sign = null;
		// var_dump(!$request->has('name'));
		try {
			if (!$request->has('name')) {
				throw new Exception("name can't be empty", 404);
			}
			if (!$request->has('password')) {
				throw new Exception("Password can't be empty", 404);
			}
			if (!$request->has('unixtime')) {
				throw new Exception("unixtime can't be empty", 404);
			}
            if (!$request->has('sign')) {
				throw new Exception("sign can't be empty", 404);
			}

            //Validate
			
			$user = User::where('name', $request->name);
			$password = User::where('password', $request->password);
			$api_token = User::where('api_token', $request->api_token);
			// global $unixtime;
			$unixtime = $request->unixtime;
			$logintime = date('Y-m-d H:m');
			

			if ($user->count() == 0) {
				throw new Exception("you may typo your name, please check again", 403);
			}

			// if($unixtime->count()==0){
			//     throw new Exception("you may typo your unixtime, please check again", 403);
			// }
			// if($api_token->count()==0){
			//     throw new Exception("you may typo your api_token, please check again", 403);
			// }

			//All Green
			$dbuser = $user->first();
            // print_r($request->sign);
            // print_r(md5($request->name . $request->unixtime . $this->salt . $request->password));
            if ($request->sign != md5($request->name . $request->unixtime . $this->salt . $request->password)) {
				throw new Exception("you  sign  is wrong, please check again", 403);
            }
			if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
                $random=Str::random(32);
                DB::table('users')->where('name', $request->name)->update(array('api_token'=>$random));
                $api_token=DB::table('users')->where('name', $request->name)->pluck('api_token');
			} else {
				if ($password->count() == 0) {
					throw new Exception("you may typo your password, please check again", 403);
				}
			};

            return response()->json(['status' => 200,
				'msg' => 'success',
				'result' => [
                    // 'frontSign' => $sign,
					// 'backendSign' => $dbsign,

					'id' => $dbuser->id,
					'gender' => $dbuser->gender,
					'chmod' => $dbuser->position,
					'level' => $dbuser->level,
                    'cellphone' =>$dbuser->cellphone,
					'api_token'=>$random,
                    
					// 'api_token'=>$dbuser->api_token,
					// 'sait'=>$this->salt,
					// 'loginstatus'=>Auth::check(),

				],

			]);

		} catch (Exception $e) {
			return response()->json([
				'status' => $e->getcode(),
				'msg' => $e->getMessage(),
			]);
		};

	}

	public function apitokencheck(Request $request){
		// ini_set('display_errors', "ON");
		// $request->api_token='y3jJNKzQa8r4BHPHIY3M7AlY9McCNWkg';0
		// var_dump($request->api_token);
		// Auth::loginUsingId(2);
		// var_dump(Auth::check());
		$db_api_token=DB::table('users')->where('api_token', $request->api_token)->pluck('api_token');
		$dbuser=DB::table('users')->where('api_token', $request->api_token)->first();
		// print_r($db_api_token);
		// print_r($dbuser);
		// print_r($request->api_token);
		try {
			if (!$request->api_token){
				throw new Exception("token can not be NULL", 989);
			}
			// if(AUth::check()){
			// 	$db_api_token=DB::table('users')->where('name', $request->name)->pluck('api_token');
			// }else{
			// 	throw new Exception("your status is not login", 898);
			// }
			if($db_api_token->count() == 0){
				throw new Exception("can not find your token at db", 987);
			}
			if($request->api_token!=$db_api_token[0]){
				throw new Exception("can not find your token at db", 999);
			}

			return response()->json([
				'status'=> 200,
				'msg'=> 'log status is fine.',
				'result' => [

					'id' => $dbuser->id,
					'gender' => $dbuser->gender,
					'chmod' => $dbuser->position,
					'level' => $dbuser->level,
                    'cellphone' =>$dbuser->cellphone,
					'api_token'=>$db_api_token,
					
				],
			]);

		} catch (Exception $e) {
			return response()->json([
				'status' => $e->getcode(),
				'msg' => $e->getMessage(),
			]);
		}
	}

	public function logout(Request $request){
		// Auth::loginUsingId(2);
		if (Auth::check()) {
			Auth::logout();
			DB::table('users')->where('id', $request->id)->update(['api_token'=>NULL]);
			$api_token=DB::table('users')->where('id', $request->id)->pluck('api_token');
			// print_r($api_token1);
			// echo '我是段落';
			// print_r($api_token2);
			// echo '我是段落';
			// print_r($api_token);
			return response()->json([
				'status'=>200,
				'msg'=>'logout suceess',
				'result'=>[
					// 'name'=>$request->name,
					'api_token'=>$api_token[0],
					// 'loginstatus'=>Auth::check(),
				],

			]);
		} else {
			$api_token=DB::table('users')->where('id', $request->id)->pluck('api_token');
			return response()->json([
				'status'=>407,
				'msg'=>'you can not logout when you are logout',
				'result'=>[
					// 'name'=>$request->name,
					'api_token'=>$api_token[0],
					// 'loginstatus'=>Auth::check(),
				],

			]);
		}
	}
}

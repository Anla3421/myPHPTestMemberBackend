<?php

namespace App\Http\Controllers\ApiManager;

use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\models\loginlog;
use App\User;
use Auth;
use Exception;
use DB;
use ArrayObject;
use Agent;

class LoginController extends Controller
{
	protected $salt;
	public function __construct() {
		$this->salt = env('APP_SALT','iamsalt');
	}
	public function login(Request $request) {
		$sign = null;
		$result = new ArrayObject();
		$loginlog = new loginlog;
		$e = NULL;

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
			// $password = User::where('password', $request->password);
			// $api_token = User::where('api_token', $request->api_token);
			$unixtime = $request->unixtime;

			if ($user->count() == 0) {
				throw new Exception("you may typo your name, please check again", 403);
			}
			
			$dbuser = $user->first();
            if ($request->sign != md5($request->name . $request->unixtime . $this->salt . $request->password)) {
				throw new Exception("you  sign  is wrong, please check again", 403);
            }
			if ($user->pluck('status')[0] == 'deactivated'){
				throw new Exception("your account has been deactivated", 9487);
			}

			//All Green
			if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
                $random=Str::random(32);
                DB::table('users')->where('name', $request->name)->update(array('api_token'=>$random));
                $api_token=DB::table('users')->where('name', $request->name)->pluck('api_token');
			} else {
				if ($password->count() == 0) {
					throw new Exception("you may typo your password, please check again", 403);
				}
			};
			
			$request->result='Success';
			$request->continue_fail=0;
			$request->dbuser=$dbuser;
			$request->random=$random;
			$request->e=$e;
			return $loginlog -> loginlog($request);
			
		/**
		 * 不進login log的error
		 */
		} catch (Exception $e) {
			if ($e->getcode() == 404 OR $e->getcode() == 9487){
				return response()->json([
					'status' => $e->getcode(),
					'msg' => $e->getMessage(),
				]);
			}else{
				$request->result='Fail';
				$request->continue_fail=1;
				$request->e=$e;
				return $loginlog -> loginlog($request);
			}
		};
	}
	
	public function apitokencheck(Request $request){
		// Auth::loginUsingId(2);
		// var_dump(Auth::check());
		$db_api_token=DB::table('users')->where('api_token', $request->api_token)->pluck('api_token');
		$dbuser=DB::table('users')->where('api_token', $request->api_token)->first();
		try {
			if (!$request->api_token){
				throw new Exception("token can not be NULL", 989);
			}
			// if(Auth::check()){
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
		DB::table('users')->where('id', $request->id)->update(['api_token'=>NULL]);
		$api_token=DB::table('users')->where('id', $request->id)->pluck('api_token');
		Auth::logout();
		return response()->json([
			'status'=>200,
			'msg'=>'logout suceess',
			'result'=>[
				// 'name'=>$request->name,
				'api_token'=>$api_token[0],
				// 'loginstatus'=>Auth::check(),
			],

		]);
	}
}

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
		$this->salt = env('APP_SALT');
	}
	public function test(Request $request) {
		// echo 123;
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

			//Validate

			$user = User::where('name', $request->name);
			$password = User::where('password', $request->password);
			$api_token = User::where('api_token', $request->api_token);
			// global $unixtime;
			$unixtime = $request->unixtime;
			$logintime = date('Y-m-d H:m');

			// $test=DB::table('users')->get();
			// foreach ($test as $id => $value) {
			//     // $test->where('created_at', '>', 'updated_at');
			//     print_r($test->where('created_at', '<', 'updated_at'));
			// }

			// print_r($test);
			// print_r($loginduetime-$logintime);

			// print_r($logintime);
			// print_r($this->salt);

			// print_r($user->first()->name."this is name".'<br>'); //123
			// var_dump($user->count()==0); //false
			// echo "<pre>";
			// print_r($user->first()->name);
			// print_r($user->get()->count()); //1
			// print_r($user->first()->count()); //3
			// print_r($user->count()); //1

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
			$sign = sha1($request->name . $unixtime . $this->salt . $dbuser->api_token); //name+unixtime+salt+apitoken
			$dbsign = sha1($dbuser->name . $unixtime . $this->salt . $dbuser->api_token);
			// var_dump($sign==$dbsign);
			if ($sign != $dbsign) {
				throw new Exception("please check again your information", 405);
			}
			// $sign2=md5($sign.$dbuser->password);
			// $dbsign2=md5($dbsign.$password->first()->password);
			// print_r($dbuser->password); //123
			// print_r($password->first()->password);  //123
			// var_dump($sign2==$dbsign2);
			// if ($sign2!=$dbsign2){
			//     throw new Exception("please check again your information", 406);
			// }
			if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
				$loginstatus = 'yes';
                $random=Str::random(32);
                DB::table('users')->where('name', $request->name)->update(array('api_token'=>$random));
                $api_token=DB::table('users')->where('name', $request->name)->pluck('api_token');
			} else {
				if ($password->count() == 0) {
					throw new Exception("you may typo your password, please check again", 403);
				}
				$loginstatus = 'no';
			};

			$token = $dbuser->api_token;


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
                    // 'api_token'=>$dbuser->api_token,
                    'api_token'=>$api_token,

				],

			]);

		} catch (Exception $e) {
			return response()->json([
				'status' => $e->getcode(),
				'msg' => $e->getMessage(),
			]);
		};

	}

	// public function anothertest(Request $request){
	//     $user=User::where('name',$request->name);
	//     $password=User::where('password',$request->password);
	//     $api_token=User::where('api_token',$request->api_token);
	//     global $unixtime;

	//     var_dump($unixtime);
	//         // print_r($user->first());
	//         // print_r($password->first());
	//         $newuser=$user->first();
	//         $newsign=md5($newuser->name.$unixtime.$this->salt.$newuser->api_token);
	//     print_r($newsign);
	// }

}

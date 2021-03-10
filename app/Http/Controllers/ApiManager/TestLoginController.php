<?php

namespace App\Http\Controllers\ApiManager;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TestLoginController extends Controller {
	/**
	 * [login description]
	 * @param  Request $request [
	 * 'name', 'password','unixtime','api_token'
	 *
	 *
	 * ]
	 * @return [type]           [description]
	 */
	public function login(Request $request) {
		$sign = null;
		$log = [];
		$loginlog = new loginlog;

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

			$log = $request->all();

			//first , checked sign ;

			if ($request->sign != md5($request->name . $request->unixtime . $this->salt . $request->password)) {

				throw new Exception("you sign is wrong, please check again", 403);

			}

			//check loginlog count

			//checked user ;activatedz

			$db_data = User::where('name', $request->name)->where('status', 'activated');

			if ($db_data->count() == 1) {

				$user = $db_data->first();

				//check password

				if ($user->password != $request->password) {

					throw new Exception("you password is wrong, please check again", 403);
				} else {

					//write log write db

					$log['continue_fail'] = 0;
					$log['result'] = 'Success';

					if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
						$check = $log->loginlog($log);
						$random = Str::random(32);
						DB::table('users')->where('name', $request->name)->update(array('api_token' => $random));
						$api_token = DB::table('users')->where('name', $request->name)->pluck('api_token');
						return response()->json(['status' => 200,
							'msg' => 'success',
							'result' => [

								'id' => $user->id,
								'gender' => $user->gender,
								'chmod' => $user->position,
								'level' => $user->level,
								'cellphone' => $user->cellphone,
								'api_token' => $random,

							],
						]);
					}

				}

			} else {
				throw new Exception("your account has been deactivated", 948787);

			}

		} catch (Exception $e) {

			$log['result'] = 'Fail';
			$log['continue_fail'] = 1;
			$log['Exception'] = $e;
			$loginlog->loginlog($log);

		};
	}

	public function loginlog($params) {

		if ($log['Exception'] == 948787) {

		} else {
			loginlog::Create([

				'account' => $Request->name,
				'ip' => $Request->getClientIp(),
				'agent' => Agent::getUserAgent(),
				'devicetype' => Agent::deviceType(),
				'platform' => Agent::platform(),
				'platformVersion' => Agent::Version(Agent::platform()),
				'browser' => Agent::Browser(),
				// 'browserVersion'=> Agent::Version(Agent::Browser()),
				'times' => $times + 1,
				'result' => $result->result,
				'continue_fail' => $result->continue_fail,
				// 'updated_at'=> $Request->updated_at,

			]);
		}
		$logincount = loginlog::where('account', $request->name)->where('continue_fail', 1)->whereBetWeen("created_at", [date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->count();
		if ($logincount > 5) {

			$login_last_success = loginlog::where('account', $request->name)->whereBetWeen("created_at", [date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->get();

			$key = end($login_last_success);

			if ($login_last_success[$key]['Result'] == 1) {

			} else {
				$user = User::where('name', $request->name);
				$user->status = 'deactivated';
				$user->save();

				throw new Exception("your account has been deactivated", 948787);
			}

		}

		return true;
	}

}

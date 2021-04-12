<?php

namespace App\Http\Controllers\ApiManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\users;
use App\models\actionlog;
use App\models\loginlog;
use App\tools\defer;
use Exception;
use DB;

class OperationController extends Controller
{
    public function loginlog(Request $request){
		try {
			if (!$request->has('api_token')) {
				throw new Exception("api_token can't be empty", 400);
			}
			if (!$request->has('id')) {
				throw new Exception("id can't be empty", 400);
			}

			$id = users::find($request->id);
			// print_r($id->position);
			if ($id->api_token == NULL) {
				throw new Exception("can not find your token at db", 987);
			}
			if ($id->api_token != $request->api_token) {
				throw new Exception("can not find your token at db", 999);
			}
			//chmod check
			// if(!$id->position){
			//     throw new Exception("Forbidden", 403);
			// };
			// if($id->position != 'administrator'){
			//     throw new Exception("Forbidden", 403);
			// };

			// $loginlog = DB::table('login_log')->get();
			$loginlog = loginlog::get()
			->wherebetween("created_at", [date($request->starttime.' 00:00:00'), date($request->endtime.' 23:59:59')])
			->sortByDesc('created_at')->flatten();
			
			$res = json_decode(json_encode($loginlog), true);
			foreach ($res as $key => $value) {
				$date_obj = new \DateTime($res[$key]['created_at']);
				$date_obj2 = new \DateTime($res[$key]['updated_at']);
				$res[$key]['created_at'] = $date_obj->format('Y-m-d H:i:s');
				$res[$key]['updated_at'] = $date_obj2->format('Y-m-d H:i:s');
			}

			return response()->json(['status' => 200,
				'msg' => 'success',
				'result' => [
					'loginlog' => $res,
				],
			]);

		} catch (Exception $e) {
			return response()->json([
				'status' => $e->getcode(),
				'msg' => $e->getMessage(),
			]);
		};
	}

	public function actionlog(Request $request){
		try {
			if (!$request->has('api_token')) {
				throw new Exception("api_token can't be empty", 400);
			}
			if (!$request->has('id')) {
				throw new Exception("id can't be empty", 400);
			}

			$id = users::find($request->id);
			// print_r($id->position);
			if ($id->api_token == NULL) {
				throw new Exception("can not find your token at db", 987);
			}
			if ($id->api_token != $request->api_token) {
				throw new Exception("can not find your token at db", 999);
			}
			//chmod check
			// if(!$id->position){
			//     throw new Exception("Forbidden", 403);
			// };
			// if($id->position != 'administrator'){
			//     throw new Exception("Forbidden", 403);
			// };

			// $loginlog = loginlog::get();

			// $actionlog = DB::table('action_log')->get();
			
			$actionlog = actionlog::get()
			->wherebetween("created_at", [date($request->starttime.' 00:00:00'), date($request->endtime.' 23:59:59')])
			->sortByDesc('created_at')->flatten();

			// $actionlog = actionlog::all()->sortByDesc('created_at')->flatten();
			foreach ($actionlog as $key => $value) {
				
				$actionlog[$key]['user'] = $value->actionlogWithUsers->name;
				unset($actionlog[$key]['actionlogWithUsers']);
			}

			$res = json_decode(json_encode($actionlog), true);
			foreach ($res as $key => $value) {
				$date_obj = new \DateTime($res[$key]['created_at']);
				$date_obj2 = new \DateTime($res[$key]['updated_at']);
				$res[$key]['created_at'] = $date_obj->format('Y-m-d H:i:s');
				$res[$key]['updated_at'] = $date_obj2->format('Y-m-d H:i:s');
			}

			return response()->json(['status' => 200,
				'msg' => 'success',
				'result' => [
					// 'actionlog' => $actionlog,
					'actionlog' => $res,
				],
			]);

		} catch (Exception $e) {
			return response()->json([
				'status' => $e->getcode(),
				'msg' => $e->getMessage(),
			]);
		};
	}
    
}

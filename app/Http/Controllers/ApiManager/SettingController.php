<?php

namespace App\Http\Controllers\ApiManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\player;
use App\models\users;
use App\models\game;
use App\models\playersave;
use App\tools\defer;
use Exception;
use DB;

class SettingController extends Controller
{
    public function playersave(Request $request) {
		try {
			if (!$request->has('api_token')) {
				throw new Exception("api_token can't be empty", 400);
			}
			if (!$request->has('id')) {
				throw new Exception("id can't be empty", 400);
			}

			// $id=DB::table('users')->find($request->id)->toarray()->api_token;
			$id = users::find($request->id);
			if ($id->api_token == NULL) {
				throw new Exception("can not find your token at db", 987);
			}
			if ($id->api_token != $request->api_token) {
				throw new Exception("can not find your token at db", 999);
			}

			$player_save = playersave::get();
			$currency_initial = DB::table('currency_initial')->get();
			$game = game::get();

			foreach ($player_save as $key => $value) {
				$value->playersaveWithGame->gameWithGameinfo;
				$value->playersaveWithCurrency;
			}

			foreach ($game as $key => $value) {
				$value->gameWithGameinfo;
			}
			// print_r($player_save);

			$res = json_decode(json_encode($player_save), true);
				foreach ($res as $key => $value) {
					$date_obj = new \DateTime($res[$key]['created_at']);
					$date_obj2 = new \DateTime($res[$key]['updated_at']);
					$res[$key]['created_at'] = $date_obj->format('Y-m-d H:i:s');
					$res[$key]['updated_at'] = $date_obj2->format('Y-m-d H:i:s');
				}
			return response()->json(['status' => 200,
				'msg' => 'success',
				'result' => [
					'player_save' => $res,
					'currency' => $currency_initial,
					'game' => $game,
				],
			]);

		} catch (Exception $e) {
			return response()->json([
				'status' => $e->getcode(),
				'msg' => $e->getMessage(),
			]);
		};
	}

	public function playersavecreate(Request $request) {
		$table = 'player_save';
		$create = true;
		$defer = new defer;
		return $defer->verifytokenandid($request, $create, $table);
	}

	public function playersaveupdate(Request $request) {
		$table = 'player_save';
		$create = false;
		$defer = new defer;
		return $defer->verifytokenandid($request, $create, $table);
	}


	public function account(Request $request) {
		try {
			if (!$request->has('api_token')) {
				throw new Exception("api_token can't be empty", 400);
			}
			if (!$request->has('id')) {
				throw new Exception("id can't be empty", 400);
			}

			// $id=DB::table('users')->find($request->id)->toarray()->api_token;
			$id = users::find($request->id);
			if ($id->api_token == NULL) {
				throw new Exception("can not find your token at db", 987);
			}
			if ($id->api_token != $request->api_token) {
				throw new Exception("can not find your token at db", 999);
			}

			// $users = DB::table('users')->get();
			$users = DB::table('users')->get();
			return response()->json(['status' => 200,
				'msg' => 'success',
				'result' => [
					'user' => $users

				],
			]);

		} catch (Exception $e) {
			return response()->json([
				'status' => $e->getcode(),
				'msg' => $e->getMessage(),
			]);
		};
	}

	public function accountcreate(Request $request) {
		$table = 'account';
		$create = true;
		$defer = new defer;
		return $defer->verifytokenandid($request, $create, $table);
	}

	public function accountupdate(Request $request) {
		$table = 'account';
		$create = false;
		$defer = new defer;
		return $defer->verifytokenandid($request, $create, $table);
	}

}
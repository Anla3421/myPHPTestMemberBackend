<?php

namespace App\Http\Controllers\ApiManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\player;

class SettingController extends Controller
{
    public function player(Request $request) {
		try {
			if (!$request->has('api_token')) {
				throw new Exception("api_token can't be empty", 400);
			}
			if (!$request->has('id')) {
				throw new Exception("id can't be empty", 400);
			}
			$id = users::find($request->id);
			if ($id->api_token == NULL) {
				throw new Exception("can not find your token at db", 987);
			}
			if ($id->api_token != $request->api_token) {
				throw new Exception("can not find your token at db", 999);
			}

			$player = player::get();
			foreach ($player as $key => $value) {
				$value->playerWithAgent;
				$value->playerWithReport->reportWithCurrency;
				$value->playerWithProvider;
				
			}
			$agent = DB::table('agent')->get();
			$provider = DB::table('provider')->get();
			// $currency_initial = DB::table('currency_initial')->get();

			return response()->json(['status' => 200,
				'msg' => 'success',
				'result' => [
					'player' => $player,
					'provider' => $provider,
					'agent'=>$agent,
					// 'currencyinitial'=>$currency_initial,
				],
			]);

		} catch (Exception $e) {
			return response()->json([
				'status' => $e->getcode(),
				'msg' => $e->getMessage(),
			]);
		};
	}

	public function playercreate(Request $request) {
		$table = 'player';
		$create = true;
		$defer = new defer;
		return $defer->verifytokenandid($request, $create, $table);
	}

	public function playerupdate(Request $request) {
		$table = 'player';
		$create = false;
		$defer = new defer;
		return $defer->verifytokenandid($request, $create, $table);
	}


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

			$player_save = DB::table('player_save')->get();
			// print_r($player_save);

			return response()->json(['status' => 200,
				'msg' => 'success',
				'result' => [
					'player_save' => $player_save,
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
}

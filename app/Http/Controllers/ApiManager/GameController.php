<?php

namespace App\Http\Controllers\ApiManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\game;
use App\models\users;
use App\tools\defer;
use Exception;
use DB;

class GameController extends Controller
{
    public function serverconfig(Request $request) {
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
			// if (!$id->position) {
			// 	throw new Exception("Forbidden", 403);
			// };
			// if ($id->position != 'administrator') {
			// 	throw new Exception("Forbidden", 403);
			// };

			$server_config = DB::table('server_config')->get();
			// print_r($server_config);

			// $agent = Agent::getUserAgent();
			// $devicetype = Agent::deviceType();
			// $platform = Agent::platform();
			// $platformVersion = Agent::Version($platform);
			// $browser = Agent::Browser();
			// $browserVersion = Agent::Version($browser);
			// $clientIP = $request->getClientIp();
			
			// $Browser = $agent->browser();
			// $bVersion = $agent->version($browser);

			// $platform = $agent->platform();
			// $pVersion = $agent->version($platform);
			// print_r($agent);
			// print_r($browser);
			// print_r($platform);
			// print_r($clientIP);

			return response()->json(['status' => 200,
				'msg' => 'success',
				'result' => [
					'server_config' => $server_config,
					// 'agent' => [
					// 	'agent' => $agent,
					// 	'devicetype' => $devicetype,
					// 	'platform' => $platform,
					// 	'platformVersion' => $platformVersion,
					// 	'browser' => $browser,
					// 	'browserVersion' => $browserVersion,
					// 	'IP' => $clientIP,
					// ],
				],
			]);

		} catch (Exception $e) {
			return response()->json([
				'status' => $e->getcode(),
				'msg' => $e->getMessage(),
			]);
		};
	}

	public function serverconfigcreate(Request $request) {
		$table = 'server_config';
		$create = true;
		$defer = new defer;
		return $defer->verifytokenandid($request, $create, $table);
	}

	public function serverconfigupdate(Request $request) {
		$table = 'server_config';
		$create = false;
		$defer = new defer;
		return $defer->verifytokenandid($request, $create, $table);
	}

    public function gamenew(Request $request) {
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

			$game = game::get();
			foreach ($game as $key => $value) {
				$value->gameWithGameinfo;
				$value->gameWithProvider;
				
				// $value->playerWithProvider->providerWithCurrency;
				// $agents[$key]['products'] = $value->agentWithProvider->name;
				// $agents[$key]['currency'] = $value->agentWithProvider->providerWithCurrency->game_currency;
				// unset($agents[$key]['agentWithProvider']);
			}
			// print_r($game);
			$provider=DB::table('provider')->get();

			$res = json_decode(json_encode($game), true);
			foreach ($res as $key => $value) {
				$date_obj = new \DateTime($res[$key]['created_at']);
				$date_obj2 = new \DateTime($res[$key]['updated_at']);
				$res[$key]['created_at'] = $date_obj->format('Y-m-d H:i:s');
				$res[$key]['updated_at'] = $date_obj2->format('Y-m-d H:i:s');
			}

			return response()->json(['status' => 200,
				'msg' => 'success',
				'result' => [
					'gamenew' => $res,
					'provider' => $provider,
				],
			]);

		} catch (Exception $e) {
			return response()->json([
				'status' => $e->getcode(),
				'msg' => $e->getMessage(),
			]);
		};
	}

	public function gamenewcreate(Request $request) {
		$table = 'gamenew';
		$create = true;
		$defer = new defer;
		return $defer->verifytokenandid($request, $create, $table);
	}

	public function gamenewupdate(Request $request) {
		$table = 'gamenew';
		$create = false;
		$defer = new defer;
		return $defer->verifytokenandid($request, $create, $table);
	}

}

<?php

namespace App\Http\Controllers\ApiManager;

use Agent;
use App\Http\Controllers\Controller;
use App\models\agents;
use App\models\game;
use App\models\mainmenu;
use App\models\player;
use App\models\provider;
use App\models\report;
use App\models\users;
use App\tools\defer;
use DB;
use Exception;
use Illuminate\Http\Request;

class IndexController extends Controller {
	public function sidebar(Request $request) {
		try {
			if (!$request->has('api_token')) {
				throw new Exception("api_token can't be empty", 999);
			}
			$api_token = users::where('api_token', $request->api_token)->first()->api_token;
			if ($api_token == NULL) {
				throw new Exception("api_token can't be empty", 987);
			}

			$mainmenu = mainmenu::all()->toArray();
			foreach ($mainmenu as $key => $value) {
				if ($value['mainpage'] != 0) {
					$main[] = $value;
				} else {
					$submain[] = $value;
				}
			}

			foreach ($main as $key => $value) {
				foreach ($submain as $keys => $values) {
					if ($value['mainpage'] == $values['subid']) {
						$main[$key]['submain'][] = $values;
					}
				}
			}

			// $mainmenu = mainmenu::get();
			// foreach ($mainmenu as $key => $value) {
			// 	if ($value->mainpage == 0) {
			// 		$submain[] = $value;
			// 	} else {
			// 		$main[] = $value;
			// 		$main[]["submain"] = new ArrayObject();
			// 	}
			// }
			// print_r($main);
			// exit;
			// foreach ($main as $mainkey => $mainvalue) {
			// foreach ($submain as $subkey => $subvalue) {
			// 	if ($mainvalue['mainpage'] == $subvalue['subid']) {
			// $main[$mainkey]["submain"]->append($subvalue);

			// }
			// }
			// }

			return response()->json(['status' => 200,
				'msg' => 'success',
				'result' => [
					'main' => $main,
				],
			]);

		} catch (Exception $e) {
			return response()->json([
				'status' => $e->getcode(),
				'msg' => $e->getMessage(),
			]);
		};
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
				$value->playerWithProviderlist;

			}
			$providerlist = DB::table('provider_list')->get();
			$agent = DB::table('agent')->get();

			return response()->json(['status' => 200,
				'msg' => 'success',
				'result' => [
					'player' => $player,
					'providerlist' => $providerlist,
					'agent'=>$agent,
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

	public function game(Request $request) {
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

			// $game = DB::table('game')->get();
			$game = game::get();

			// print_r($game->gameWithProvider->name);
			foreach ($game as $key => $value) {
				$value->gameWithGameinfo;

				if (isset($value->gameWithProvider->name)) {
					$game[$key]['provider_name'] = $value->gameWithProvider->name;
				} else {
					$game[$key]['provider_name'] = 'no search result';
				}

				unset($game[$key]['gameWithProvider']);
			}
			
			// $game = game::get();
			// foreach ($game as $key2){
			//     $key2->gameWithProvider->name;

			// }

			// $res = json_decode(json_encode($game), true);
			// foreach ($res as $key => $value) {
			// 	$date_obj = new \DateTime($res[$key]['created_at']);
			// 	$date_obj2 = new \DateTime($res[$key]['updated_at']);
			// 	$res[$key]['created_at'] = $date_obj->format('Y-m-d H:i:s');
			// 	$res[$key]['updated_at'] = $date_obj2->format('Y-m-d H:i:s');
			// }

			return response()->json(['status' => 200,
				'msg' => 'success',
				'result' => [
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

	public function gamecreate(Request $request) {
		$table = 'game';
		$create = true;
		$defer = new defer;
		return $defer->verifytokenandid($request, $create, $table);
	}

	public function gameupdate(Request $request) {
		$table = 'game';
		$create = false;
		$defer = new defer;
		return $defer->verifytokenandid($request, $create, $table);
	}

	public function gameinfo(Request $request) {
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

			$gameinfo = DB::table('game_info')->get();
			// print_r($gameinfo);
			$clientIP = $request->getClientIp();

			// if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
			//     $ip = $_SERVER["HTTP_CLIENT_IP"];
			// } else if (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
			//     $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
			// } else {
			//     $ip = $_SERVER["REMOTE_ADDR"];
			// }

			return response()->json(['status' => 200,
				'msg' => 'success',
				'result' => [
					'game_info' => $gameinfo,
					'clientIP' => $clientIP,
				],
			]);

		} catch (Exception $e) {
			return response()->json([
				'status' => $e->getcode(),
				'msg' => $e->getMessage(),
			]);
		};
	}

	public function gameinfocreate(Request $request) {
		$table = 'game_info';
		$create = true;
		$defer = new defer;
		return $defer->verifytokenandid($request, $create, $table);
	}

	public function gameinfoupdate(Request $request) {
		$table = 'game_info';
		$create = false;
		$defer = new defer;
		return $defer->verifytokenandid($request, $create, $table);
	}

	public function provider(Request $request) {
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

			$provider = provider::get();
			// print_r($provider);

			//'是否'vs'10'轉換
			// foreach ($provider as $key => $value) {
			// 	if($provider[$key]->enabled==1){
			// 		$provider[$key]->enabled='是';
			// 	}else{
			// 		$provider[$key]['enable']='否';
			// 	}
			// }

			return response()->json(['status' => 200,
				'msg' => 'success',
				'result' => [
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

	public function providercreate(Request $request) {
		$table = 'provider';
		$create = true;
		$defer = new defer;
		return $defer->verifytokenandid($request, $create, $table);
	}

	public function providerupdate(Request $request) {
		$table = 'provider';
		$create = false;
		$defer = new defer;
		return $defer->verifytokenandid($request, $create, $table);
	}

	/**
	 *
	 */
	public function reportcombine(Request $request) {
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

			$reports = report::all();
			// print_r($reports);
			// foreach ($reports as $key => $value) {
			// 	$data[$key] = $value;
			// 	$data[$key]['dtl'] = $value->reportdtl;
			// 	unset($data[$key]['reportdtl']);
			// }

			// foreach ($reports as $report) {
			// $data[] = $report;
			// $data[][] = $report->reportdtl;
			// }

			foreach ($reports as $report) {
				$report->reportdtl;
			}
			var_dump($reports);
			return response()->json(['status' => 200,
				'msg' => 'success',
				'result' => [
					'report' => $reports,
				],
			]);

		} catch (Exception $e) {
			return response()->json([
				'status' => $e->getcode(),
				'msg' => $e->getMessage(),
			]);
		};
	}
	/**
	 *
	 */

	public function report(Request $request) {
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

			$report = DB::table('report')->get();
			// print_r($report);

			return response()->json(['status' => 200,
				'msg' => 'success',
				'result' => [
					'report' => $report,
				],
			]);

		} catch (Exception $e) {
			return response()->json([
				'status' => $e->getcode(),
				'msg' => $e->getMessage(),
			]);
		};
	}

	public function reportcreate(Request $request) {
		$table = 'report';
		$create = true;
		$defer = new defer;
		return $defer->verifytokenandid($request, $create, $table);
	}

	public function reportupdate(Request $request) {
		$table = 'report';
		$create = false;
		$defer = new defer;
		return $defer->verifytokenandid($request, $create, $table);
	}

	public function reportdtl(Request $request) {
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

			$report_dtl = DB::table('report_dtl')->get();
			// print_r($server_config);

			return response()->json(['status' => 200,
				'msg' => 'success',
				'result' => [
					'report_dtl' => $report_dtl,
				],
			]);

		} catch (Exception $e) {
			return response()->json([
				'status' => $e->getcode(),
				'msg' => $e->getMessage(),
			]);
		};
	}

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

			$agent = Agent::getUserAgent();
			$devicetype = Agent::deviceType();
			$platform = Agent::platform();
			$platformVersion = Agent::Version($platform);
			$browser = Agent::Browser();
			$browserVersion = Agent::Version($browser);
			$clientIP = $request->getClientIp();
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
					'agent' => [
						'agent' => $agent,
						'devicetype' => $devicetype,
						'platform' => $platform,
						'platformVersion' => $platformVersion,
						'browser' => $browser,
						'browserVersion' => $browserVersion,
						'IP' => $clientIP,
					],
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

	public function agent(Request $request) {
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
			// chmod check
			if (!$id->position) {
				throw new Exception("Forbidden", 403);
			};
			if ($id->position != 'administrator') {
				throw new Exception("Forbidden", 403);
			};
			///////////////////////////////////////////////////////////////////////////////////////////////////////////
			$agents = agents::get();
			foreach ($agents as $key => $value) {
				// $value->playerWithProvider->providerWithCurrency;
				$agents[$key]['products'] = $value->agentWithProvider->name;
				$agents[$key]['currency'] = $value->agentWithProvider->providerWithCurrency->game_currency;
				unset($agents[$key]['agentWithProvider']);
			}

			$agent = Agent::getUserAgent();
			$clientIP = $request->getClientIps();
			// $Browser = $agent->browser();
			// $bVersion = $agent->version($browser);

			// $platform = $agent->platform();
			// $pVersion = $agent->version($platform);

			return response()->json(['status' => 200,
				'msg' => 'success',
				'result' => [
					'agents' => $agents,
					'agent' => [
						'agent' => $agent,
						// 'B'=>$Browser,
						// 'BV'=>$bVersion,
						// 'P'=>$platform,
						// 'PV'=>$pVersion,
					],
					'clientIP' => $clientIP,
				],
			]);

		} catch (Exception $e) {
			return response()->json([
				'status' => $e->getcode(),
				'msg' => $e->getMessage(),
			]);
		};

	}

	public function member(Request $request) {
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

			$server_config = DB::table('server_config')->get();
			print_r($server_config);

			return response()->json(['status' => 200,
				'msg' => 'success',
				'result' => [
					'server_config' => $server_config,
				],
			]);

		} catch (Exception $e) {
			return response()->json([
				'status' => $e->getcode(),
				'msg' => $e->getMessage(),
			]);
		};

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
				$value->gameWithProvider->providerWithProviderlist;
				$value->gameWithProvider->providerWithCurrency;
				// // $value->playerWithProvider->providerWithCurrency;
				// $agents[$key]['products'] = $value->agentWithProvider->name;
				// $agents[$key]['currency'] = $value->agentWithProvider->providerWithCurrency->game_currency;
				// unset($agents[$key]['agentWithProvider']);
			}
			// print_r($game);

			$res = json_decode(json_encode($game), true);
			foreach ($res as $key => $value) {
				$date_obj = new \DateTime($res[$key]['created_at']);
				$date_obj2 = new \DateTime($res[$key]['updated_at']);
				$res[$key]['created_at'] = $date_obj->format('Y-m-d H:i:s');
				$res[$key]['updated_at'] = $date_obj2->format('Y-m-d H:i:s');
			}

			$providerlist = DB::table('provider_list')->get();

			return response()->json(['status' => 200,
				'msg' => 'success',
				'result' => [
					'gamenew' => $res,
					'providerlist' => $providerlist,
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

	public function actionlogtest(Request $request){
		
		ActionLog::save(Route::getCurrentRoute()->action['parent'],2,'remark text',$system_permission);
		// {!! $RESULT_HTML !!} ;

	}
}

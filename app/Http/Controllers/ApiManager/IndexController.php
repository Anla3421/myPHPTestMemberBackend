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
use App\models\actionlog;
use App\tools\defer;
use App\tools\timeformat;
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

			// $main
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

			// $providerlist = DB::table('provider_list')->get();

			$res = json_decode(json_encode($provider), true);
			foreach ($res as $key => $value) {
				$date_obj = new \DateTime($res[$key]['created_at']);
				$date_obj2 = new \DateTime($res[$key]['updated_at']);
				$res[$key]['created_at'] = $date_obj->format('Y-m-d H:i:s');
				$res[$key]['updated_at'] = $date_obj2->format('Y-m-d H:i:s');
			}

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
					'provider' => $res,
					// 'provider' => $provider,
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

			$report = report::get();
			$game = game::get();
			$provider = provider::get();
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

			// $agents = agents::get();
			// foreach ($agents as $key => $value) {
			// 	// $valgotkue->playerWithProvider->providerWithCurrency;
			// 	$value->agentWithProvider->name;
			// 	$value->agentWithProvider->providerWithCurrency->game_currency;
			// 	// $agents[$key]['products'] = $value->agentWithProvider->name;
			// 	// $agents[$key]['currency'] = $value->agentWithProvider->providerWithCurrency->game_currency;
			// 	// unset($agents[$key]['agentWithProvider']);
			// }

			foreach ($report as $key => $value) {
				$value->reportWithReportdtl;
				$value->reportWithGame->gameWithGameinfo;
				// $value->reportWithPlayer->playerWithAgent->agentWithProvider->providerWithCurrency;
				$value->reportWithCurrency;
				$value->reportWithPlayer->playerWithProvider;
			}
			foreach ($game as $key => $value) {
				$value->gameWithGameinfo;
			}
			
			// var_dump($reports);
			return response()->json(['status' => 200,
				'msg' => 'success',
				'result' => [
					'report' => $report,
					'game' => $game,
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

	public function reportcombinecreate(Request $request) {
		$table = 'reportcombine';
		$create = true;
		$defer = new defer;
		return $defer->verifytokenandid($request, $create, $table);
	}

	public function reportcombineupdate(Request $request) {
		$table = 'reportcombine';
		$create = false;
		$defer = new defer;
		return $defer->verifytokenandid($request, $create, $table);
	}

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

			$res=response()->json(['status' => 200,
			'msg' => 'success',
			'result' => [
				'report' => $report,
			],
				]);
			print_r($res);
			return $res;

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
			// if (!$id->position) {
			// 	throw new Exception("Forbidden", 403);
			// };
			// if ($id->position != 'administrator') {
			// 	throw new Exception("Forbidden", 403);
			// };

			$agents = agents::get();
			foreach ($agents as $key => $value) {
				// $value->playerWithProvider->providerWithCurrency;
				$value->agentWithProvider;
				
				// $agents[$key]['products'] = $value->agentWithProvider->name;
				// $agents[$key]['currency'] = $value->agentWithProvider->providerWithCurrency->game_currency;
				// unset($agents[$key]['agentWithProvider']);
			}

			// $needtochange = $agent;
			// $res = new timeformat;
			// $res->timeformat($needtochange);

			$res = json_decode(json_encode($agents), true);
			foreach ($res as $key => $value) {
				$date_obj = new \DateTime($res[$key]['created_at']);
				$date_obj2 = new \DateTime($res[$key]['updated_at']);
				$res[$key]['created_at'] = $date_obj->format('Y-m-d H:i:s');
				$res[$key]['updated_at'] = $date_obj2->format('Y-m-d H:i:s');
			}

			$provider = DB::table('provider')->get();
			
			return response()->json(['status' => 200,
				'msg' => 'success',
				'result' => [
					'agents' => $res,
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

	public function agentcreate(Request $request) {
		$table = 'agent';
		$create = true;
		$defer = new defer;
		return $defer->verifytokenandid($request, $create, $table);
	}

	public function agentupdate(Request $request) {
		$table = 'agent';
		$create = false;
		$defer = new defer;
		return $defer->verifytokenandid($request, $create, $table);
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
			// print_r($server_config);

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

			// $loginlog = loginlog::get();

			$loginlog = DB::table('login_log')->get();

			return response()->json(['status' => 200,
				'msg' => 'success',
				'result' => [
					'loginlog' => $loginlog,
					// 'provider' => $provider,
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
			
			$actionlog = actionlog::get();
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

	public function wallet(Request $request){
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
			
			$wallet = player::get();
			foreach ($wallet as $key => $value) {
				$value->playerWithCurrency;
				$value->playerWithAgent;
				$value->playerWithProvider;
				
				
				// $wallet[$key]['user'] = $value->playerWithPlayersave;
				// unset($wallet[$key]['actionlogWithUsers']);
			}

			$currency_initial = DB::table('currency_initial')->get();
			$provider = DB::table('provider')->get();
			$agent = DB::table('agent')->get();
			
			
			return response()->json(['status' => 200,
				'msg' => 'success',
				'result' => [
					// 'actionlog' => $actionlog,
					'wallet' => $wallet,
					'currency_initial' => $currency_initial,
					'provider' => $provider,
					'agent' => $agent,
				],
			]);

		} catch (Exception $e) {
			return response()->json([
				'status' => $e->getcode(),
				'msg' => $e->getMessage(),
			]);
		};
	}

	public function walletcreate(Request $request) {
		$table = 'wallet';
		$create = true;
		$defer = new defer;
		return $defer->verifytokenandid($request, $create, $table);
	}

	public function walletupdate(Request $request) {
		$table = 'wallet';
		$create = false;
		$defer = new defer;
		return $defer->verifytokenandid($request, $create, $table);
	}

	// public function actionlogtest(Request $request){
		
	// 	ActionLog::save(Route::getCurrentRoute()->action['parent'],2,'remark text',$system_permission);
	// 	// {!! $RESULT_HTML !!} ;

	// }
}

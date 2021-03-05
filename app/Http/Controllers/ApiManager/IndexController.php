<?php

namespace App\Http\Controllers\ApiManager;

use App\Http\Controllers\Controller;
use App\models\mainmenu;
use App\models\player;
use App\models\report;
use App\models\users;
use App\models\game;
use App\models\provider;
use App\tools\defer;

use ArrayObject;
use DB;
use Exception;
use Illuminate\Http\Request;
use DateTimeInterface;

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

			$mainmenu = mainmenu::get();
			foreach ($mainmenu as $key => $value) {
				if ($value->mainpage == 0) {
					$submain[$key] = $value;
				} else {
					$main[$key] = $value;
					$main[$key]["submain"] = new ArrayObject();
				}
			}
			foreach ($main as $mainkey => $mainvalue) {
				foreach ($submain as $subkey => $subvalue) {
					if ($mainvalue['mainpage'] == $subvalue['subid']) {
						$main[$mainkey]["submain"]->append($subvalue);
					}

				}
			}
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

			$player = DB::table('player')->get();
			// print_r($player);

			return response()->json(['status' => 200,
				'msg' => 'success',
				'result' => [
					'player' => $player,
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
            foreach ($game as $key =>$value){
                $value->gameWithGameinfo;
				$game[$key]['provider_name']=$value->gameWithProvider->name;
				unset($game[$key]['gameWithProvider']);
            }

		
			// $game = game::get();
			// foreach ($game as $key2){
            //     $key2->gameWithProvider->name;
				
            // }
			
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
					'game' => $res,
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

			return response()->json(['status' => 200,
				'msg' => 'success',
				'result' => [
					'game_info' => $gameinfo,
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

	public function agent(Request $request){
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
///////////////////////////////////////////////////////////////////////////////////////////////////////////
			$agent = player::get();
			foreach ($agent as $key => $value) {
				$value->playerWithProvider;
				$value->providerWithGame;
				// $agent[$key]['']
			}

			return response()->json(['status' => 200,
				'msg' => 'success',
				'result' => [
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

	public function member(Request $request){
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

}

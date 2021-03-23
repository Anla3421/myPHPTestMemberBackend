<?php

namespace App\Http\Controllers\ApiManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\agents;
use App\models\users;
use App\models\provider;
use App\models\player;
use App\tools\defer;
use Exception;
use DB;



class AccountController extends Controller
{
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
				$value->playerWithProvider;
				
			}
			$provider = DB::table('provider')->get();
			// $currency_initial = DB::table('currency_initial')->get();

			return response()->json(['status' => 200,
				'msg' => 'success',
				'result' => [
					'player' => $player,
					'provider' => $provider,
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

}
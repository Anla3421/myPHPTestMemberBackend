<?php

namespace App\Http\Controllers\ApiManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\users;
use App\models\report;
use App\models\game;
use App\models\provider;
use App\models\player;
use App\models\reportdtl;
use App\tools\defer;
use ArrayObject;
use Exception;
use DB;

class ReportController extends Controller
{
	public function winlose(Request $request) {
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

			foreach ($report as $key => $value) {
				// foreach ($value as $key => $reportWithReportdtl){
				// 	$value->reportWithReportdtl;
				// }
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

	public function winlosecreate(Request $request) {
		$table = 'winlose';
		$create = true;
		$defer = new defer;
		return $defer->verifytokenandid($request, $create, $table);
	}

	public function winloseupdate(Request $request) {
		$table = 'winlose';
		$create = false;
		$defer = new defer;
		return $defer->verifytokenandid($request, $create, $table);
	}

	public function bethistory(Request $request) {
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

			$report = report::all();
			$reportdtl = reportdtl::get();
			$game = game::get();
			$provider = provider::get();
			$i=1;
			$j=0;
			// foreach ($report as $key => $value) {
			// 	$newreport[] = $value;
			// 	print($newreport);
			// }

			// $report[]['我我我'][]=new ArrayObject();

			// foreach ($report as $key => $value) {
			// 	// $value->reportWithReportdtl;
			// 	// $value[$key][$key2] = new ArrayObject();
			// 	foreach ($reportdtl as $key2 => $reportdtl2) {
			// 		$j++;
			// 		if ($value['id'] == $reportdtl2['id']){
			// 			$report[$key]['我我我'] = $reportdtl2;
			// 			print_r("第".$i."次".'r2第'.$j.$report);
			// 		}
			// 		$i++;
			// 	}
			// }
			
			foreach ($report as $key => $value) {
				$value->reportWithReportdtl;
				// $value->reportWithGame->gameWithGameinfo;
				// $value->reportWithCurrency;
				// $value->reportWithPlayer->playerWithProvider;

				// $value->reportWithPlayer->playerWithAgent->agentWithProvider->providerWithCurrency;
			// }
			// foreach ($game as $key => $value) {
			// 	$value->gameWithGameinfo;
			}
			
			// var_dump($reports);
			return response()->json(['status' => 200,
				'msg' => 'success',
				'result' => [
					'report' => $report,
					// 'game' => $game,
					// 'provider' => $provider,
				],
			]);
				exit;
		} catch (Exception $e) {
			return response()->json([
				'status' => $e->getcode(),
				'msg' => $e->getMessage(),
			]);
		};
	}

	public function bethistorycreate(Request $request) {
		$table = 'bethistory';
		$create = true;
		$defer = new defer;
		return $defer->verifytokenandid($request, $create, $table);
	}

	public function bethistoryupdate(Request $request) {
		$table = 'bethistory';
		$create = false;
		$defer = new defer;
		return $defer->verifytokenandid($request, $create, $table);
	}

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

}

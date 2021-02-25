<?php

namespace App\Http\Controllers\MAXdis;

use App\Http\Controllers\Controller;
use App\models\mainmenu;
use DB;
use Exception;
use Illuminate\Http\Request;
use ArrayObject;

class Apiindex extends Controller
{
    public function login(Request $request){

    }

    public function sidebar(Request $request){
        try {
			if (!$request->has('api_token')) {
				throw new Exception("api_token can't be empty", 999);
			}
			$mainmenu = mainmenu::get();
			foreach ($mainmenu as $key => $value) {
				if($value->mainpage==0){
					$submain[$key]=$value;
				}else{
					$main[$key]=$value;
					$main[$key]["submain"] = new ArrayObject();
				}
			}
			foreach ($main as $mainkey => $mainvalue) {
				foreach ($submain as $subkey => $subvalue) {
					if($mainvalue['mainpage']==$subvalue['subid']){
						$main[$mainkey]["submain"]->append($subvalue);
					}
					
				}
			}
			return response()->json(['status' => 200,
			'msg' => 'success',
			'result' => [
				'main' => $main,
			]
			]);

			} catch (Exception $e) {
				return response()->json([
					'status' => $e->getcode(),
					'msg' => $e->getMessage(),
				]);
			};
	}
    

    public function playersave(Request $request){
        try {
			if (!$request->has('api_token')) {
				throw new Exception("api_token can't be empty", 400);
			}
            if (!$request->has('id')) {
				throw new Exception("id can't be empty", 400);
			}

            

        $player_save=DB::table('player_save')->get();
        // print_r($player_save);

        
        return response()->json(['status' => 200,
        'msg' => 'success',
        'result' => [
            'player_save' => $player_save,
        ]
        ]);


        } catch (Exception $e) {
            return response()->json([
                'status' => $e->getcode(),
                'msg' => $e->getMessage(),
            ]);
        };
    }

    public function player(Request $request){
        try {
			if (!$request->has('api_token')) {
				throw new Exception("api_token can't be empty", 400);
			}
            if (!$request->has('id')) {
				throw new Exception("id can't be empty", 400);
			}


        $player=DB::table('player')->get();
        // print_r($player);

        
        return response()->json(['status' => 200,
        'msg' => 'success',
        'result' => [
            'player' => $player,
        ]
        ]);


        } catch (Exception $e) {
            return response()->json([
                'status' => $e->getcode(),
                'msg' => $e->getMessage(),
            ]);
        };
    }

    public function game(Request $request){
        try {
			if (!$request->has('api_token')) {
				throw new Exception("api_token can't be empty", 400);
			}
            if (!$request->has('id')) {
				throw new Exception("id can't be empty", 400);
			}


        $game=DB::table('game')->get();

        
        return response()->json(['status' => 200,
        'msg' => 'success',
        'result' => [
            'game' => $game,
        ]
        ]);


        } catch (Exception $e) {
            return response()->json([
                'status' => $e->getcode(),
                'msg' => $e->getMessage(),
            ]);
        };
    }

    public function gameinfo(Request $request){
        try {
			if (!$request->has('api_token')) {
				throw new Exception("api_token can't be empty", 400);
			}
            if (!$request->has('id')) {
				throw new Exception("id can't be empty", 400);
			}


        $gameinfo=DB::table('gameinfo')->get();
        // print_r($gameinfo);

        
        return response()->json(['status' => 200,
        'msg' => 'success',
        'result' => [
            'gameinfo' => $gameinfo,
        ]
        ]);


        } catch (Exception $e) {
            return response()->json([
                'status' => $e->getcode(),
                'msg' => $e->getMessage(),
            ]);
        };
    }

    public function report(Request $request){
        try {
			if (!$request->has('api_token')) {
				throw new Exception("api_token can't be empty", 400);
			}
            if (!$request->has('id')) {
				throw new Exception("id can't be empty", 400);
			}


        $report=DB::table('report')->get();
        // print_r($report);

        
        return response()->json(['status' => 200,
        'msg' => 'success',
        'result' => [
            'report' => $report,
        ]
        ]);


        } catch (Exception $e) {
            return response()->json([
                'status' => $e->getcode(),
                'msg' => $e->getMessage(),
            ]);
        };
    }

    public function reportdtl(Request $request){
        try {
			if (!$request->has('api_token')) {
				throw new Exception("api_token can't be empty", 400);
			}
            if (!$request->has('id')) {
				throw new Exception("id can't be empty", 400);
			}


        $report_dtl=DB::table('report_dtl')->get();
        // print_r($server_config);

        
        return response()->json(['status' => 200,
        'msg' => 'success',
        'result' => [
            'report_dtl' => $report_dtl,
        ]
        ]);


        } catch (Exception $e) {
            return response()->json([
                'status' => $e->getcode(),
                'msg' => $e->getMessage(),
            ]);
        };
    }

    public function serverconfig(Request $request){
        try {
			if (!$request->has('api_token')) {
				throw new Exception("api_token can't be empty", 400);
			}
            if (!$request->has('id')) {
				throw new Exception("id can't be empty", 400);
			}


        $server_config=DB::table('server_config')->get();
        // print_r($server_config);

        
        return response()->json(['status' => 200,
        'msg' => 'success',
        'result' => [
            'server_config' => $server_config,
        ]
        ]);


        } catch (Exception $e) {
            return response()->json([
                'status' => $e->getcode(),
                'msg' => $e->getMessage(),
            ]);
        };
    }

    

}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Exception;

class Apiindex extends Controller
{
    public function index(Request $request){
        $gamelist=DB::table('gamelist')->pluck('gamename');
        // $userlist=DB::table('users')->where('name',$request->name)->first();
        $wallet=DB::table('cash')->where('name','123')->pluck('money');
        // print_r($gamelist);
        try {
			if (!$request->has('api_token')) {
				throw new Exception("api_token can't be empty", 999);
			}
        
            return response()->json(['status' => 200,
				'msg' => 'success',
				'result' => [
                    'gamelist'=>$gamelist,
                    // 'userlist'=>$userlist,
                    'wallet'=>$wallet,
				],
            ]);
        
        } catch (Exception $e) {
            return response()->json([
                'status' => $e->getcode(),
                'msg' => $e->getMessage(),
            ]);
        };
    }

    public function winlose(Request $request){
        $winlose=DB::table('report')->where('name',$request->name)->pluck('win/lose');
        // print_r($winlose);
        return response()->json([
            'status'=>200,
            'msg'=>'success',
            'win/lose'=>$winlose,
        ]);
    }

    public function bethistory(Request $request){
        $bethistory=DB::table('report')->where('name',$request->name)->pluck('bethistory');
        // print_r($bethistory);
        return response()->json([
            'status'=>200,
            'msg'=>'success',
            'win/lose'=>$bethistory,
        ]);
    }

    public function loginat(Request $request){
        $loginat=DB::table('log')->where('name',$request->name)->pluck('login_at');
        // print_r($bethistory);
        return response()->json([
            'status'=>200,
            'msg'=>'success',
            'win/lose'=>$loginat,
        ]);
    }

    public function actionlog(Request $request){
        $actionlog=DB::table('log')->where('name',$request->name)->pluck('actionlog');
        // print_r($actionlog);
        return response()->json([
            'status'=>200,
            'msg'=>'success',
            'win/lose'=>$actionlog,
        ]);
    }

    public function allreport(Request $request){
        $winlose=DB::table('report')->where('name',$request->name)->pluck('win/lose','bethistory');
        $bethistory=DB::table('report')->where('name',$request->name)->pluck('bethistory');
        $wallet=DB::table('cash')->where('name',$request->name)->pluck('money');
        return response()->json([
            'status'=>200,
            'msg'=>'success',
            'win/lose'=>$winlose,
            'bethistory'=>$bethistory,
            'wallet'=>$wallet,
        ]);
    }

}

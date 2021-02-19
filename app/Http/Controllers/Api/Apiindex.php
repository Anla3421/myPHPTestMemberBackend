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
        $wallet=DB::table('cash')->where('id',1)->pluck('money');
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
}

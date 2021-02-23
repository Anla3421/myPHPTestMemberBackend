<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Exception;

class Apiarray extends Controller
{
    public function array(Request $request){
        $main =[];
        $db = DB::table('mainmenu')->get()->toArray();
        // echo "<pre>";

        foreach ((Array)$db as $key => $value) {
            if($value->mainpage>0){
                $main[$key] =$value ;
            }
        }
        // print_r($main);

        // exit;
        foreach ((Array)$main as $key => $value) {
            foreach ($db as $key1 => $values) {
                
                if($value->id == $values->subid ){

                    // echo "a";

                    $main[$key]->$key1=$values;
                    $newarray=array_values($main);
                }


            }

        }
        // print_r($main);
        print_r($newarray);
        try {
			if (!$request->has('api_token')) {
				throw new Exception("api_token can't be empty", 999);
			}
        
            return response()->json(['status' => 200,
				'msg' => 'success',
				'result' => [
                    // 'menu'=>$menu,
                    // 'gamelist'=>$gamelist,
                    // 'userlist'=>$userlist,
                    // 'wallet'=>$wallet,
                    'main'=>$main,
                    
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

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\models\mainmenu;
use DB;
use Exception;
use Illuminate\Http\Request;
use Query\Builder;

class Apiarray extends Controller {
	public function newarray(Request $request) {
        ob_start();
    $t = microtime(true);
    $i = 0;
    while($i < 1000) {


		$main = [];
		$db = DB::table('mainmenu')->get()->toarray();
		// echo "<pre>";
		foreach ((Array) $db as $key => $value) {
			if ($value->mainpage > 0) {
				$main[$key] = $value;
			}
		}
		// print_r($main);

		// exit;
		foreach ((Array) $main as $key => $value) {
			foreach ($db as $key1 => $values) {

				if ($value->id == $values->subid) {

					// echo "a";

					$main[$key]->$key1 = $values;
				}

			}

		}
		// print_r($main);
        // $submain = mainmenu::get()->toArray();
		// print_r($submain);

        ++$i;
    }
    $tmp = microtime(true) - $t;
    ob_end_clean();

    return response()->json([
        'time'=>$tmp,
    ]);
    }

	public function array(Request $request) {
        $mainmenu3 = mainmenu::get()->toarray();
        $mainmenu2 = mainmenu::get();
        $mainmenu=$mainmenu2;
        // print_r($mainmenu3);
        // print_r($mainmenu);
        
        foreach ($mainmenu as $key => $value) {
            if($value->mainpage==0){
            $submain[$key]=$value;
        }else{
            $main[$key]=$value ;
            }
        }
        
        // print_r($main);
        // print_r($submain);

        foreach ($main as $mainkey => $mainvalue) {
            foreach ($submain as $subkey => $subvalue) {
                if($mainvalue['mainpage']==$subvalue['subid']){
                    $main[$mainkey]['submain'][$subkey]=$subvalue;
                    // $main[$mainkey]['submain'][]=$subvalue;

                }
 
            }
        }


        // $main2 = mainmenu::where('mainpage', '>', 0)->get()->toArray();
        
        print_r($main);
        // print_r($main2);

        
        return response()->json(['status' => 200,
        'msg' => 'success',
        'result' => [
            // 'menu'=>$menu,
            // 'gamelist'=>$gamelist,
            // 'userlist'=>$userlist,
            // 'wallet'=>$wallet,
            'main' => $main,
            // 'submain' => $submain,
        ]
        ]);
exit;
		$main = mainmenu::where('mainpage', '>', 0)->get()->toArray();
		$submain = mainmenu::where('mainpage', 0)->get()->toArray();
        


		foreach ($main as $key => $value) {
			foreach ($submain as $key1 => $values) {

				if ($value['id'] == $values['subid']) {

					// echo "a";

					$main[$key]['submain'][] = $values;
				}

			}
		}

		// echo "<pre>";
		// print_r($main);

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
    
}

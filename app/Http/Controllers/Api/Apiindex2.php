<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Exception;
use ArrayObject;

class Apiindex2 extends Controller
{
    public function index(Request $request){

//         function set(&$x, &$a )
//         {
//             $x[] = $a;
//         }
        
//         $x = new ArrayObject();
//         $y = array();
//         $z = new ArrayObject();
        
//         $a =  array( 'foo' );
//         set($y,$a);
//         set($x,$a);
//         $z[]=$a;
        
//         $a = array( 'bar');
        
//         set($x,$a);
//         set($y,$a);
//         $z[]=$a;
        
//         print_r($x);
//         print_r($y);
//         // print_r($z);

// exit();
        // function set(&$mainmenuget, &$accountmanage )
        // {
        //     $mainmenuget[] = $accountmanage;
        // }

        // $mainmenuget = new ArrayObject(DB::table('mainmenu')->where('mainpage','!=','0')->get());
        // $accountmanage=DB::table('mainmenu')->where('subid','1')->pluck('table');
        
        
        
        // $gamelist=DB::table('gamelist')->pluck('gamename');
        // // $userlist=DB::table('users')->where('name',$request->name)->first();
        // $wallet=DB::table('cash')->where('name','123')->pluck('money');

        // $mainmenu=DB::table('mainmenu')->where('mainpage','!=','0')->pluck('table','mainpage');
        // $mainmenuget=new ArrayObject(DB::table('mainmenu')->where('mainpage','!=','0')->get());
        // $accountmanage=DB::table('mainmenu')->where('subid','1')->pluck('table');

        // print_r($accountmanage);
        // // print_r($mainmenuget[0]->table);
        // print_r($mainmenuget);
        // $i=0;
        // $j=0;
        // $aaa=$mainmenuget->offsetSet(5,'123');
        // var_dump($aaa);
        // // foreach ($mainmenuget as $key => $value) {
        //     foreach ($mainmenuget[$i] as $key){
        //         $mainmenuget[$i]->append('123');
        //         echo 'aaaaaaaa'.$i;
        //         var_dump($mainmenuget[$i]);
        //         exit();
        //         $i++;
        //         if ($i==4){
        //             break;
        //         }
        //     }
            
            // print_r($mainmenuget);
        // }

        // $accountmanage=DB::table('mainmenu')->where('subid','1')->pluck('table');
        // $settingmanage=DB::table('mainmenu')->where('subid','2')->pluck('table','subid');
        // $reportmanage=DB::table('mainmenu')->where('subid','3')->pluck('table','subid');
        // $operationmanage=DB::table('mainmenu')->where('subid','4')->pluck('table','subid');
        // // $menu=array_merge_recursive($mainmenu,$accountmanage);
        // $menu=array(
        //     $mainmenu,
        //     array(
        //         $accountmanage,
        //     ),
        //     array(
        //         $settingmanage,
        //     ),
        //     array(
        //         $reportmanage,
        //     ),
        //     array(
        //         $operationmanage,
        //     ),
        // );
        // // print_r($menu);
        // print_r($mainmenu);
        // print_r($accountmanage);
        // exit();
        // print_r($gamelist);
        // print_r($mainmenu);
        // print_r($mainmenuget);
        // exit();
        $table = DB::find();
        $temp = array_column($table, 'name', 'main');
        $temp = [
            '1' => value,
            '2' => value,
            '3' => value,
            '4' => value,
        ];
        
        foreach ($table as $index => $value) {
            $keys = array_keys($temp);
            if (in_array($value['subid'], $keys)) {
                $target = array_search($value['subid'], $keys);
                $temp[$target][] = array('???' => $value);
            }
        }

        
        

        $main =[];
            $db = DB::table('mainmenu')->get()->toArray();
            echo "<pre>";
       
            foreach ((Array)$db as $key => $value) {
                if($value->mainpage>0){
                    $main[$key] =$value ;
                }
            }
            print_r($main);

            // exit;
            foreach ((Array)$main as $key => $value) {
                foreach ($db as $key1 => $values) {
                    
                    if($value->id == $values->subid ){

                        echo "a";

                        $main[$key]->$key1=$values;
                    }


                }

            }

            print_r($main);
            // exit();


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
        $arr = array(
            'qwe'=>'999',
            array(
                'id' => 123,
                'value' => 'aaaaaaaaa',
            ),
            array(
                'id' => 456,
                'value' => 'bbbbbbbbb',
            ),
        );
        
        echo "<pre>";
        print_r($arr);
        // var_dump();

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



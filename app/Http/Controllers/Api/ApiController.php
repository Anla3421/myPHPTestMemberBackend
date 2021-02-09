<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\User;

class ApiController extends Controller
{
    // protected 
    public function __construct(){
        $this->salt=env('APP_SALT','CESTUDIO');
    }
    public function test(Request $request){
        // echo 123;
        // var_dump(!$request->has('name'));
        
        try{
            if (!$request->has('name')){
                throw new Exception("name can't be empty", 404);
            }
            if (!$request->has('password')){
                throw new Exception("Password can't be empty", 404);
            }
            if (!$request->has('unixtime')){
                throw new Exception("unixtime can't be empty", 404);
            }

            //Validate

            $user=User::where('name',$request->name);
            $password=User::where('password',$request->password);
            // $api_token=User::where('api_token',$request->api_token);
            $unixtime=$request->unixtime;

            // print_r($user->first()->name."this is name".'<br>'); //123
            // var_dump($user->count()==0); //false
            // echo "<pre>";
            // print_r($user->first()->name);
            // print_r($user->get()->count()); //1
            // print_r($user->first()->count()); //3
            // print_r($user->count()); //1

            if($user->count()==0){
                throw new Exception("you may typo your name, please check again", 403);
            }
            if($password->count()==0){
                throw new Exception("you may typo your password, please check again", 403);
            }
            // if($unixtime->count()==0){
            //     throw new Exception("you may typo your unixtime, please check again", 403);
            // }
            // if($api_token->count()==0){
            //     throw new Exception("you may typo your api_token, please check again", 403);
            // }

            //All Green
            $newuser=$user->first();
            $sign=md5($request->name.$unixtime.$this->salt.$newuser->api_token);
            
            $newsign=md5($newuser->name.$unixtime.$this->salt.$newuser->api_token);
                

            print_r("!!!!!!!!!!!Sign".$sign);
            print_r("!!!!!!!!!!!newSign".$newsign);
            return response()->json([
                'status'=> 200,
                'msg'=> 'Validate all pass',
                'result1'=>$sign,
                'result2'=>$newsign,

            ]);

            


        }catch(Exception $e){
            return response()->json([
                'status'=>$e->getcode(),
                'msg'=>$e->getMessage(),
            ]);
        };

    }
}

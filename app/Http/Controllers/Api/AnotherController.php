<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\User;

class AnotherController extends Controller
{
    public $apiurl;
    protected $client;
    public function __construct(){
        $this->apiurl=env('APIURL','localhost:8000/api/ano/test');
        $this->Client= new Client([
            'base,url'=>'localhost:8000/api/ano/test',
            'time'=>2.0,
        ]);
    }

    // public function sendbalance(Request $request){
    //     $client=new Client();
    //     $res=$Client->request('post',$url,['json'=>[
    //         'user'=>'admin',
    //         'unixtime'=>time(),
    //     ]]);
    //     print_r($res->getBody()->getContents());
    // }

    
    public function sendbalance(Request $request){
        $client=new Client();
        $res=$Client->request('post',$url,['json'=>[
            'user'=>'admin',
            'unixtime'=>time(),
        ]]);

        if(!$reques->user){
            $userID='admin,'
        }

        print_r($res->getBody()->getContents());
    }


    public function anothertest(Request $request){
        //Validate

        $user=User::where('name',$request->name);
        $password=User::where('password',$request->password);

        $newuser=$user->first();
        $newsign=md5($newuser->name.$unixtime.$this->salt.$newuser->api_token);
    }
}

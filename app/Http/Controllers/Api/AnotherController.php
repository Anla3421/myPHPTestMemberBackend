<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\User;
use GuzzleHttp\Client;

class AnotherController extends Controller
{
    public $apiurl;
    protected $Client;
    public function __construct(){
        $this->apiurl=env('APIURL','localhost:8079/api/test');
        $this->Client= new Client([
            'base_url'=>'localhost:8079/api/test',
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
        // $Client=new Client();
        print_r($request);
        $res=$this->Client->request('post',$this->apiurl,['json'=>[
            'name'=>'123',
            'password'=>'$2y$10$6QTAsx8wC/6.B1SYl66xhORaXMqH0Rhh8IwzQhxXiR/gyhA167fOy',
            'unixtime'=>time(),
        ]]);
        var_dump($this->Client);

        if(!$request->user){
            $userID='name';
        }

        print_r($res->getBody()->getContents());
    }

    public function balance(Request $request){
        if(!$request->user){
            $userID='name';
        }
        $unixtime = time();
        $need_params=[
            'user'=>$userID,
            'unixtime'=>$unixtime,
        ];
        $user=user::where('user',$userID);
        $sign=md5($need_params['user'].$need_params['unixtime'].$this->salt.$user->first()->api_token);
        $client=new client();
        $res=$client->$request('post',$url,['json=>need_params']);

        print_r($res->getBody()->getContent());
    }



//     public function anothertest(Request $request){
//         //Validate

//         $user=User::where('name',$request->name);
//         $password=User::where('password',$request->password);

//         $newuser=$user->first();
//  $newsign=md5($newuser->name.$unixtime.$this->salt.$newuser->api_token);
//     }
}

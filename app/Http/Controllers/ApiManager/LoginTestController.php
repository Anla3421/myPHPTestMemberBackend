<?php

namespace App\Http\Controllers\ApiManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\User;
use GuzzleHttp\Client;

class LoginTestController extends Controller
{
    public $apiurl;
    protected $Client;
    protected $salt;
    public function __construct(){
        $this->apiurl=env('APIURL','localhost:8079/api/login'); //@localhost
        // $this->apiurl=env('APIURL','http://test777.ukyo.idv.tw/api/test');
        $this->Client= new Client([
            'base_url'=>'localhost:8079/api/login', //@localhost
            // 'base_url'=>'http://test777.ukyo.idv.tw/api/test',
            'time'=>2.0,
        ]);
        $this->salt = env('APP_SALT','iamsalt');
    }

    // public function sendbalance(Request $request){
    //     $client=new Client();
    //     $res=$Client->request('post',$url,['json'=>[
    //         'user'=>'admin',
    //         'unixtime'=>time(),
    //     ]]);
    //     print_r($res->getBody()->getContents());
    // }



    public function login(Request $request){
        $name='admin';
        $password='adm';
        $unixtime=time();
        $res=$this->Client->request('post',$this->apiurl,['json'=>[
            'name'=>$name,
            // 'password'=>'$2y$10$LuItf/NoDhdkxyKaZcxw7uVLHkStcFLddlTkx0ZIuVfEtJdBxc.cq',
            'password'=>$password,
            'unixtime'=>$unixtime,
            'sign'=>md5($name . $unixtime . $this->salt . $password)
        ]]);
        // var_dump($this->Client);
        // var_dump(md5($name . $unixtime . $this->salt . $password));
        if(!$request->user){
            $userID='name';
        }

        print_r($res->getBody()->getContents());
    }

    // public function balance(Request $request){
    //     if(!$request->user){
    //         $userID='name';
    //     }
    //     $unixtime = time();
    //     $need_params=[
    //         'user'=>$userID,
    //         'unixtime'=>$unixtime,
    //     ];
    //     $user=user::where('user',$userID);
    //     $sign=md5($need_params['user'].$need_params['unixtime'].$this->salt.$user->first()->api_token);
    //     $client=new client();
    //     $res=$client->$request('post',$url,['json=>need_params']);

    //     print_r($res->getBody()->getContent());
    // }



//     public function anothertest(Request $request){
//         //Validate

//         $user=User::where('name',$request->name);
//         $password=User::where('password',$request->password);

//         $newuser=$user->first();
//  $newsign=md5($newuser->name.$unixtime.$this->salt.$newuser->api_token);
//     }
}

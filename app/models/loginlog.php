<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Agent;

class loginlog extends Model
{
    protected $guard=[];
    protected $fillable = [
        'account','name', 'password','remember_check','remember_token','gender','cellphone', 'email',
        'level','position','ip','agent','devicetype','platform','platformVersion','browser',
        'browserVersion','times','result','continue_fail',
    ];
    // public $timestamps = false;
    protected $table='login_log';

    public function loginlog($Request,$result){
        // print_r($Request->getClientIp());
        // print_r(Agent::getUserAgent());
        // print_r(loginlog::where('account',$Request->name)->pluck('times')->take(-2));
        
        //是否為首次登入
        $DBname=loginlog::where('account',$Request->name);
        if ($DBname->count() == 0){
            $times=0;
        }else{
            $times=$DBname->pluck('times')->take(-1)->first();
        }
        // var_dump($result->aaa);
		// 	exit;
        loginlog::Create([
            
            'account'=> $Request->name,
            'ip'=> $Request->getClientIp(),
            'agent'=> Agent::getUserAgent(),
            'devicetype'=> Agent::deviceType(),
            'platform'=> Agent::platform(),
            'platformVersion'=> Agent::Version(Agent::platform()),
            'browser'=> Agent::Browser(),
            // 'browserVersion'=> Agent::Version(Agent::Browser()),
            'times'=> $times+1,
            'result'=> $result->result,
            'continue_fail'=> $result->continue_fail,
            // 'updated_at'=> $Request->updated_at,
            
        ]);
        
        if ($result->continue_fail == 1){
            // print_r($DBname->pluck('continue_fail')->take(-3)->avg());
            if ($DBname->pluck('continue_fail')->take(-3)->contains(0)){
                //鎖帳號
            }
        }
        
    }
}

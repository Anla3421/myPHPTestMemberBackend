<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Agent;
use Exception;

class loginlog extends Model
{
    protected $guarded = [];
    protected $table='login_log';

    public function loginlog($Request){
        
        /**
         * 是否為首次登入
         */
        $DBname=loginlog::where('account',$Request->name);
        if ($DBname->count() == 0){
            $times=0;
        }else{
            $times=$DBname->pluck('times')->take(-1)->first();
        }

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
            'result'=> $Request->result,
            'continue_fail'=> $Request->continue_fail,
        ]);

        /**
         * 回傳訊息類型判斷
         */
        if ($Request->continue_fail == 1){
            // print_r($DBname->pluck('continue_fail')->take(-3)->avg());
            if ($DBname->pluck('continue_fail')->count() > 2 && !$DBname->pluck('continue_fail')->take(-3)->contains(0)){
                users::where('name',$Request->name)->update([
                    'status'=>'deactivated',
                ]);
                return response()->json([
                    'status' => '8787',
                    'msg' => 'login continue fail 3 times, you account will be deactivated, please call customer service to activate',
                ]);
            }else{
                /**
                 * 鎖帳號以外要記錄的error
                 */
                return response()->json([
                    'status' => $Request->e->getcode(),
                    'msg' => $Request->e->getMessage(),
                ]);
            }
        }
        /**
         * 登入正常
         */
        return response()->json([
            'status' => 200,
            'msg' => 'Success',
            'result' => [
                'id' => $Request->dbuser->id,
                'gender' => $Request->dbuser->gender,
                'chmod' => $Request->dbuser->position,
                'level' => $Request->dbuser->level,
                'cellphone' =>$Request->dbuser->cellphone,
                'api_token'=>$Request->random,
            ],
        ]);
    }
}
